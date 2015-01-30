<?php
/**
 * Created by PhpStorm.
 * User: akeem
 * Date: 1/29/15
 * Time: 7:04 PM
 */

namespace Gedmo\Mapping\Mock;


use PHPCR\NodeType\NodeDefinitionInterface;
use PHPCR\NodeType\NodeTypeInterface;
use PHPCR\NodeType\PropertyDefinitionInterface;

class NodeType implements NodeTypeInterface {
    /**
     * Returns all supertypes of this node type in the node type inheritance
     * hierarchy.
     *
     * For primary types apart from nt:base, this list will always
     * include at least nt:base. For mixin types, there is no required supertype.
     *
     * @return NodeTypeInterface[] an array of all parent NodeTypes
     *
     * @api
     */
    public function getSupertypes()
    {
        // TODO: Implement getSupertypes() method.
    }

    /**
     * Returns the names of all supertypes of this node type in the node type
     * inheritance hierarchy.
     *
     * For primary types apart from nt:base, this list will always
     * include at least nt:base. For mixin types, there is no required supertype.
     *
     * @see getSupertypes()
     * @see NodeTypeDefinition::getDeclaredSupertypeNames()
     *
     * @return array the names of all supertypes
     *
     * @since JCR 2.1
     */
    public function getSupertypeNames()
    {
        // TODO: Implement getSupertypeNames() method.
    }

    /**
     * Returns the direct supertypes of this node type in the node type
     * inheritance hierarchy, that is, those actually declared in this node
     * type.
     *
     * In single-inheritance systems, this will always be an array of
     * size 0 or 1. In systems that support multiple inheritance of node
     * types this array may be of size greater than 1.
     *
     * @return NodeTypeInterface[] an array of NodeTypes that are direct
     *      parents of this type.
     *
     * @api
     */
    public function getDeclaredSupertypes()
    {
        // TODO: Implement getDeclaredSupertypes() method.
    }

    /**
     * Returns all subtypes of this node type in the node type inheritance
     * hierarchy.
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and <b>Countable</b>.
     *      Keys are the node type names, values the corresponding
     *      NodeTypeInterface instances.
     *
     * @see getDeclaredSubtypes()
     *
     * @api
     */
    public function getSubtypes()
    {
        // TODO: Implement getSubtypes() method.
    }

    /**
     * Returns the direct subtypes of this node type in the node type inheritance
     * hierarchy, that is, those which actually declared this node type in their
     * list of supertypes.
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and <b>Countable</b>.
     *      Keys are the node type names, values the corresponding
     *      NodeTypeInterface instances.
     *
     * @see getSubtypes()
     *
     * @api
     */
    public function getDeclaredSubtypes()
    {
        // TODO: Implement getDeclaredSubtypes() method.
    }

    /**
     * Reports if the name of this node type or any of its direct or indirect
     * supertypes is equal to nodeTypeName.
     *
     * Returns true if the name of this node type or any of its direct or
     * indirect supertypes is equal to nodeTypeName, otherwise returns false.
     *
     * @param string $nodeTypeName the name of a node type.
     *
     * @return boolean
     *
     * @api
     */
    public function isNodeType($nodeTypeName)
    {
        // TODO: Implement isNodeType() method.
    }

    /**
     * Returns an array containing the property definitions of this node type.
     *
     * This includes both those property definitions actually declared
     * in this node type and those inherited from the supertypes of this type.
     *
     * @return PropertyDefinitionInterface[] an array of property definitions
     *
     * @api
     */
    public function getPropertyDefinitions()
    {
        return array();
        // TODO: Implement getPropertyDefinitions() method.
    }

    /**
     * Returns an array containing the child node definitions of this node type.
     *
     * This includes both those child node definitions actually declared in this
     * node type and those inherited from the supertypes of this node type.
     *
     * @return NodeDefinitionInterface[] An array of child node definitions
     *
     * @api
     */
    public function getChildNodeDefinitions()
    {
        // TODO: Implement getChildNodeDefinitions() method.
    }

    /**
     * Determines if the node type allows to set the value of a property.
     *
     * Returns true if setting propertyName is allowed and the value is of the
     * required type or can be converted into that type.
     * Otherwise returns false.
     *
     * @param string $propertyName The name of the property
     * @param mixed $value A value or an array of values
     *
     * @return boolean True if setting propertyName to value is allowed by this
     *      node type, else false.
     *
     * @api
     */
    public function canSetProperty($propertyName, $value)
    {
        // TODO: Implement canSetProperty() method.
    }

    /**
     * Determines if this node type allows the addition of a child node.
     *
     * Returns true if this node type allows the addition of a child node called
     * childNodeName without specific node type information (that is, given the
     * definition of this parent node type, the child node name is sufficient to
     * determine the intended child node type). Returns false otherwise.
     * If $nodeTypeName is given returns true if this node type allows the
     * addition of a child node called childNodeName of node type nodeTypeName.
     * Returns false otherwise.
     *
     * @param string $childNodeName The name of the child node.
     * @param string $nodeTypeName The name of the node type of the child node.
     *
     * @return boolean True, if the node type allows the addition of a child
     *      node, else false.
     *
     * @api
     */
    public function canAddChildNode($childNodeName, $nodeTypeName = null)
    {
        // TODO: Implement canAddChildNode() method.
    }

    /**
     * Reports if the node type allows the removal of the given node.
     *
     * Returns true if removing the child node called nodeName is allowed by this
     * node type. Returns false otherwise.
     *
     * @param string $nodeName The name of the child node.
     *
     * @return boolean True, if the node type allows to remove the passed node,
     *      else false.
     *
     * @api
     */
    public function canRemoveNode($nodeName)
    {
        // TODO: Implement canRemoveNode() method.
    }

    /**
     * Determines if the node type allows to remove the property identified by
     * the given name.
     *
     * Returns true if removing the property called propertyName is allowed by
     * this node type. Returns false otherwise.
     *
     * @param string $propertyName The name of the property
     *
     * @return boolean True, if the removal of the property is allowed, else
     *      false.
     *
     * @api
     */
    public function canRemoveProperty($propertyName)
    {
        // TODO: Implement canRemoveProperty() method.
    }

    /**
     * Returns the name of the node type.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return null.
     *
     * @return string The name of the node type.
     *
     * @api
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * Returns the names of the supertypes actually declared in this node type.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return an array containing a
     * single string indicating the node type nt:base.
     *
     * @return array the names of the declared supertypes.
     *
     * @api
     */
    public function getDeclaredSupertypeNames()
    {
        // TODO: Implement getDeclaredSupertypeNames() method.
    }

    /**
     * Reports if this is an node type.
     *
     * Returns true if this is an node type; returns false otherwise.
     * An node type is one that cannot be assigned as the primary or
     * mixin type of a node but can be used in the definitions of other node
     * types as a superclass.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return false.
     *
     * @return boolean True, if the current type is abstract, else false.
     *
     * @api
     */
    public function isAbstract()
    {
        // TODO: Implement isAbstract() method.
    }

    /**
     * Reports if this is a mixin node type.
     *
     * Returns true if this is a mixin type; returns false if it is primary.
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return false.
     *
     * @return boolean True if this is a mixin type, else false;
     *
     * @api
     */
    public function isMixin()
    {
        // TODO: Implement isMixin() method.
    }

    /**
     * Determines if nodes of this type must support orderable child nodes.
     *
     * Returns true if nodes of this type must support orderable child nodes;
     * returns false otherwise. If a node type returns true on a call to this
     * method, then all nodes of that node type must support the method
     * NodeInterface::orderBefore(). If a node type returns false on a call to
     * this method, then nodes of that node type may support
     * NodeInterface::orderBefore(). Only the primary node type of a node
     * controls that node's status in this regard. This setting on a mixin node
     * type will not have any effect on the node.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinitionInterface object is actually a newly-created empty
     * NodeTypeTemplateInterface, then this method will return false.
     *
     * @return boolean True, if nodes of this type must support orderable child
     *      nodes, else false.
     *
     * @api
     */
    public function hasOrderableChildNodes()
    {
        // TODO: Implement hasOrderableChildNodes() method.
    }

    /**
     * Determines if the node type is queryable.
     *
     * Returns true if the node type is queryable, meaning that the
     * available-query-operators, full-text-searchable and query-orderable
     * attributes of its property definitions take effect.
     *
     * If a node type is declared non-queryable then these attributes of its
     * property definitions have no effect.
     *
     * @return boolean True, if the node type is queryable, else false.
     *
     * @see PropertyDefinition::getAvailableQueryOperators()
     * @see PropertyDefinition::isFullTextSearchable()
     * @see PropertyDefinition::isQueryOrderable()
     *
     * @api
     */
    public function isQueryable()
    {
        // TODO: Implement isQueryable() method.
    }

    /**
     * Returns the name of the primary item (one of the child items of the nodes
     * of this node type).
     *
     * If this node has no primary item, then this method returns null. This
     * indicator is used by the method NodeInterface::getPrimaryItem().
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinitionInterface object is actually a newly-created empty
     * NodeTypeTemplateInterface, then this method will return null.
     *
     * @return string The name of the primary item.
     *
     * @api
     */
    public function getPrimaryItemName()
    {
        // TODO: Implement getPrimaryItemName() method.
    }

    /**
     * Returns an array containing the property definitions actually declared
     * in this node type.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return null.
     *
     * @return PropertyDefinitionInterface[] An array of PropertyDefinitions.
     *
     * @api
     */
    public function getDeclaredPropertyDefinitions()
    {
        return null;
    }

    /**
     * Returns an array containing the child node definitions actually
     * declared in this node type.
     *
     * In implementations that support node type registration, if this
     * NodeTypeDefinition object is actually a newly-created empty
     * NodeTypeTemplate, then this method will return null.
     *
     * @return NodeDefinitionInterface[] An array of NodeDefinitions.
     *
     * @api
     */
    public function getDeclaredChildNodeDefinitions()
    {
        // TODO: Implement getDeclaredChildNodeDefinitions() method.
    }


}