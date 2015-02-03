<?php

namespace Tool;

use Doctrine\DBAL\DriverManager;
use Doctrine\ODM\PHPCR\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\ODM\PHPCR\Repository\DefaultRepositoryFactory;
use Doctrine\Common\EventManager;
use Gedmo\Mapping\Mock\Node;
use Gedmo\Mapping\Mock\NodeType;
use Gedmo\Translatable\TranslatableListener;
use Gedmo\Sluggable\SluggableListener;
use Gedmo\Timestampable\TimestampableListener;
use Gedmo\SoftDeleteable\SoftDeleteableListener;
use Gedmo\Loggable\LoggableListener;
use Jackalope\Session;
use Jackalope\RepositoryFactoryDoctrineDBAL;
use Jackalope\Tools\Console\Command\InitDoctrineDbalCommand;

/**
 * Base test case contains common mock objects
 * and functionality among all extensions using
 * ORM object manager
 *
 * @author Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 * @link http://www.gediminasm.org
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
abstract class BaseTestCasePHPCRODM extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DocumentManager
     */
    protected $dm;
    protected $sessions;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        foreach ($this->sessions as $session) {
            $session->logout();
        }
        $this->sessions = array();

        if ($this->dm) {
            $this->dm->clear();
            $this->dm->close();
            $this->dm = null;
        }
    }

    /**
     * DocumentManager mock object together with
     * annotation mapping driver and database
     *
     * @param EventManager $evm
     *
     * @return DocumentManager
     */
    protected function getMockDocumentManager(EventManager $evm = null, $config = null)
    {
        $config = $config ? $config : $this->getMockAnnotatedConfig();

        $conn = array(
            'driver' => 'pdo_sqlite',
            'memory' => true,
        );

        $workspace = 'default';
        $user = 'admin';
        $pass = 'admin';
        $factory = new \Jackalope\RepositoryFactoryDoctrineDBAL();
        $connection = DriverManager::getConnection($conn);
        $repository = $factory->getRepository(array('jackalope.doctrine_dbal_connection' => $connection));
        $credentials = new \PHPCR\SimpleCredentials(null, null);

        //init the dbal
        $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
            'connection' => new \Jackalope\Tools\Console\Helper\DoctrineDbalHelper($connection)
        ));

        $command = new InitDoctrineDbalCommand();
        $command->setHelperSet($helperSet);
        $command->run($this->getMock('Symfony\\Component\\Console\\Input\\InputInterface'),$this->getMock('Symfony\\Component\\Console\\Output\\OutputInterface'));


        $session = $repository->login($credentials, $workspace);
        $this->sessions[] = $session;



        try {
            $this->dm = DocumentManager::create($session,$config, $evm ?: $this->getEventManager());
        } catch (\RuntimeException $e) {
            var_dump($e->getMessage());die();
//            $this->markTestSkipped('Doctrine PHPCR ODM failed to connect');
        }

        return $this->dm;
    }

    /**
     * DocumentManager mock object with
     * annotation mapping driver
     *
     * @param EventManager $evm
     *
     * @return DocumentManager
     */
    protected function getMockMappedDocumentManager(EventManager $evm = null, $config = null)
    {
        $config = $config ? $config : $this->getMockAnnotatedConfig();
        $session = $this->getMockSession();

        $this->dm = DocumentManager::create($session, $config, $evm ?: $this->getEventManager());

        return $this->dm;
    }

    /**
     * Creates default mapping driver
     *
     * @return \Doctrine\ORM\Mapping\Driver\Driver
     */
    protected function getMetadataDriverImplementation()
    {
        return new AnnotationDriver($_ENV['annotation_reader']);
    }

    /**
     * Build event manager
     *
     * @return EventManager
     */
    private function getEventManager()
    {
        $evm = new EventManager();
        $evm->addEventSubscriber(new SluggableListener());
        $evm->addEventSubscriber(new LoggableListener());
        $evm->addEventSubscriber(new TranslatableListener());
        $evm->addEventSubscriber(new TimestampableListener());
        $evm->addEventSubscriber(new SoftDeleteableListener());

        return $evm;
    }

    protected function getMockSession()
    {
        $session = $this->getMock('PHPCR\\SessionInterface');
        $transactionManager = $this->getMock('PHPCR\\Transaction\\UserTransactionInterface');
        $nodeTypeManager = $this->getMock('PHPCR\\NodeType\\NodeTypeManagerInterface');
        $nodeTypeManager->expects($this->any())
            ->method('getNodeType')
            ->will($this->returnValue(new NodeType()));
        $node = new Node();
        $workSpace = $this->getMock('PHPCR\\WorkspaceInterface');
        $workSpace->expects($this->any())
            ->method('getTransactionManager')
            ->will($this->returnValue($transactionManager));
        $workSpace->expects($this->any())
            ->method('getNodeTypeManager')
            ->will($this->returnValue($nodeTypeManager));

        $qm = $this->getMock('PHPCR\\Query\\QueryManagerInterface');
        $qm->expects($this->any())
            ->method('getQOMFactory')
            ->will($this->returnValue($this->getMock('PHPCR\\Query\\QOM\\QueryObjectModelFactoryInterface')));
        $workSpace->expects($this->any())
                  ->method('getQueryManager')
                  ->will($this->returnValue($qm));

        $session->expects($this->any())
            ->method('getWorkspace')
            ->will($this->returnValue($workSpace));

        $session->expects($this->any())
            ->method('getNode')
            ->will($this->returnValue($node));

        return $session;
    }


    /**
     * Get annotation mapping configuration
     *
     * @return Doctrine\ODM\PHPCR\Configuration
     */
    protected function getMockAnnotatedConfig()
    {
        $config = $this->getMock('Doctrine\\ODM\\PHPCR\\Configuration');

        $config->expects($this->any())
            ->method('getFilterClassName')
            ->will($this->returnValue('Gedmo\\SoftDeleteable\\Filter\\ODM\\SoftDeleteableFilter'));

        $config->expects($this->once())
            ->method('getProxyDir')
            ->will($this->returnValue(__DIR__.'/../../temp'));

        $config->expects($this->once())
            ->method('getProxyNamespace')
            ->will($this->returnValue('Proxy'));

        $repositoryFactory = new DefaultRepositoryFactory();
        $config->expects($this->once())
            ->method('getRepositoryFactory')
            ->will($this->returnValue($repositoryFactory));

        $config->expects($this->once())
            ->method('getAutoGenerateProxyClasses')
            ->will($this->returnValue(true));


        $config->expects($this->once())
            ->method('getClassMetadataFactoryName')
            ->will($this->returnValue('Doctrine\\ODM\\PHPCR\\Mapping\\ClassMetadataFactory'));

        $mappingDriver = $this->getMetadataDriverImplementation();

        $config->expects($this->any())
            ->method('getMetadataDriverImpl')
            ->will($this->returnValue($mappingDriver));


        return $config;
    }
}
