<?php
/**
 * Created by PhpStorm.
 * User: akeem
 * Date: 1/29/15
 * Time: 6:10 PM
 */

namespace Gedmo\Mapping\Mock;


use PHPCR\AccessDeniedException;
use PHPCR\InvalidItemStateException;
use PHPCR\InvalidLifecycleTransitionException;
use PHPCR\ItemExistsException;
use PHPCR\ItemInterface;
use PHPCR\ItemNotFoundException;
use PHPCR\ItemVisitorInterface;
use PHPCR\NamespaceException;
use PHPCR\NodeInterface;
use PHPCR\NodeType\NodeTypeInterface;
use PHPCR\NoSuchWorkspaceException;
use PHPCR\PathNotFoundException;
use PHPCR\PropertyInterface;
use PHPCR\RepositoryException;
use PHPCR\SessionInterface;
use PHPCR\UnsupportedRepositoryOperationException;
use PHPCR\ValueFormatException;
use Traversable;


class Node implements \IteratorAggregate, NodeInterface {

    /**
     * Returns the normalized absolute path to this item.
     *
     * @return string              the normalized absolute path of this Item.
     * @throws RepositoryException if an error occurs.
     * @api
     */
    public function getPath()
    {
        // TODO: Implement getPath() method.
    }

    /**
     * Returns the name of this Item in qualified form.
     *
     * If this Item is the root node of the workspace, an empty string is returned.
     *
     * @return string the name of this Item in qualified form or an empty
     *      string if this Item is the root node of a workspace.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * Returns the ancestor of this Item at the specified depth.
     *
     * An ancestor of depth x is the Item that is x levels down along the path
     * from the root node to this Item.
     *
     * - depth = 0 returns the root node of a workspace.
     * - depth = 1 returns the child of the root node along the path to this
     *      Item.
     * - depth = 2 returns the grandchild of the root node along the path to
     *      this Item.
     * - And so on to depth = n, where n is the depth of this Item, which
     *      returns this Item itself.
     *
     * If this node has more than one path (i.e., if it is a descendant of a
     * shared node) then the path used to define the ancestor is implementaion-
     * dependent.
     *
     * @param integer $depth An integer, 0 <= depth <= n where n is the depth
     *      of this Item.
     *
     * @return ItemInterface The ancestor of this Item at the specified
     *      depth.
     *
     * @throws ItemNotFoundException if depth < 0 or depth > n
     *      where n is the depth of this item.
     * @throws AccessDeniedException if the current session does not
     *      have sufficient access to retrieve the specified node.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getAncestor($depth)
    {
        // TODO: Implement getAncestor() method.
    }

    /**
     * Returns the parent of this Item.
     *
     * @return NodeInterface The parent of this Item.
     *
     * @throws ItemNotFoundException if this Item is the root node of a
     *      workspace.
     * @throws AccessDeniedException if the current session does not
     *      have sufficient access to retrieve the parent of this item.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getParent()
    {
        // TODO: Implement getParent() method.
    }

    /**
     * Returns the depth of this Item in the workspace item graph.
     *
     * - The root node returns 0.
     * - A property or child node of the root node returns 1.
     * - A property or child node of a child node of the root returns 2.
     * - And so on to this Item.
     *
     * @return integer The depth of this Item in the workspace item graph.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getDepth()
    {
        // TODO: Implement getDepth() method.
    }

    /**
     * Returns the Session through which this Item was acquired.
     *
     * @return SessionInterface the Session through which this Item was
     *      acquired.
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getSession()
    {
        // TODO: Implement getSession() method.
    }

    /**
     * Indicates whether this Item is a Node or a Property.
     *
     * Returns true if this Item is a Node; Returns false if this Item is a
     * Property.
     *
     * @return boolean true if this Item is a Node, false if it is a Property.
     *
     * @api
     */
    public function isNode()
    {
        // TODO: Implement isNode() method.
    }

    /**
     * Determines if the current item is a new one.
     *
     * Returns true if this is a new item, meaning that it exists only in
     * transient storage on the Session and has not yet been saved. Within a
     * transaction, isNew on an Item may return false (because the item has
     * been saved) even if that Item is not in persistent storage (because the
     * transaction has not yet been committed).
     *
     * Note that if an item returns true on isNew, then by definition is parent
     * will return true on isModified.
     *
     * Note that in read-only implementations, this method will always return
     * false.
     *
     * @return boolean true if this item is new; false otherwise.
     *
     * @api
     */
    public function isNew()
    {
        // TODO: Implement isNew() method.
    }

    /**
     * Indicates if the current item has been modified.
     *
     * Returns true if this Item has been saved but has subsequently been
     * modified through the current session and therefore the state of this
     * item as recorded in the session differs from the state of this item as
     * saved. Within a transaction, isModified on an Item may return false
     * (because the Item has been saved since the modification) even if the
     * modification in question is not in persistent storage (because the
     * transaction has not yet been committed).
     *
     * Note that in read-only implementations, this method will always return
     * false.
     *
     * @return boolean true if this item is modified; false otherwise.
     *
     * @api
     */
    public function isModified()
    {
        // TODO: Implement isModified() method.
    }

    /**
     * Determines if this Item object represents the same actual workspace item
     * as the object otherItem.
     *
     * Two Item objects represent the same workspace item if all the following
     * are true:
     *
     * - Both objects were acquired through Session objects that were created
     *   by the same Repository object.
     * - Both objects were acquired through Session objects bound to the same
     *   repository workspace.
     * - The objects are either both Node objects or both Property
     *   objects.
     * - If they are Node objects, they have the same identifier.
     * - If they are Property objects they have identical names and
     *   isSame() is true of their parent nodes.
     *
     * This method does not compare the states of the two items. For example, if
     * two Item objects representing the same actual workspace item have been
     * retrieved through two different sessions and one has been modified, then
     * this method will still return true when comparing these two objects.
     * Note that if two Item objects representing the same workspace item are
     * retrieved through the same session they will always reflect the same
     * state.
     *
     * @param ItemInterface $otherItem the Item object to be tested for
     *      identity with this Item.
     *
     * @return boolean true if this Item object and otherItem represent the
     *      same actual repository item; false otherwise.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function isSame(ItemInterface $otherItem)
    {
        // TODO: Implement isSame() method.
    }

    /**
     * Call the ItemVisitor::visit() method.
     *
     * This is less relevant in PHP (Java had it to avoid typecasting in the
     * visitor). We leave it here, to allow sanity checks or other operations
     * an implementation might wants to do.
     *
     * @param ItemVisitorInterface $visitor The ItemVisitor to be
     *      accepted.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function accept(ItemVisitorInterface $visitor)
    {
        // TODO: Implement accept() method.
    }

    /**
     * Discard all pending changes on this item and its children.
     *
     * This method discards all pending changes currently recorded in this
     * <code>Session</code> that apply to this Item or any of its child nodes
     * and properties and returns these items to reflect the current saved
     * state. Outside a transaction this state is simply the current state of
     * persistent storage. Within a transaction, this state will reflect
     * persistent storage as modified by changes that have been saved but not
     * yet committed.
     *
     * @throws InvalidItemStateException if this <code>Item</code> object
     *      represents a workspace item that has been removed (either by this
     *      session or another).
     * @throws RepositoryException if another error occurs.
     *
     * @since JCR 2.1
     */
    public function revert()
    {
        // TODO: Implement revert() method.
    }

    /**
     * Removes this item (and its subgraph).
     *
     * To persist a removal, a save must be performed that includes the (former)
     * parent of the removed item within its scope.
     *
     * If a node with same-name siblings is removed, this decrements by one the
     * indices of all the siblings with indices greater than that of the removed
     * node. In other words, a removal compacts the array of same-name siblings
     * and causes the minimal re-numbering required to maintain the original
     * order but leave no gaps in the numbering.
     *
     * @throws \PHPCR\Version\VersionException if the parent node of this item
     *      is versionable and checked-in or is non-versionable but its nearest
     *      versionable ancestor is checked-in and this implementation performs
     *      this validation immediately instead of waiting until save.
     * @throws \PHPCR\Lock\LockException if a lock prevents the removal of this
     *      item and this implementation performs this validation immediately
     *      instead of waiting until save.
     * @throws \PHPCR\NodeType\ConstraintViolationException if removing the
     *      specified item would violate a node type or implementation-specific
     *      constraint and this implementation performs this validation
     *      immediately instead of waiting until save.
     * @throws \PHPCR\AccessDeniedException if this item or an item in its
     *      subgraph is currently the target of a REFERENCE property located in
     *      this workspace but outside this item's subgraph and the current
     *      Session does not have read access to that REFERENCE property or if
     *      the current Session does not have sufficient privileges to remove
     *      the item.
     * @throws RepositoryException if another error occurs.
     *
     * @see SessionInterface::removeItem(String)
     *
     * @api
     */
    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * Creates a new node at the specified $relPath
     *
     * This is session-write method, meaning that the addition of the new node
     * is dispatched upon SessionInterface::save().
     *
     * The $relPath provided must not have an index on its final element,
     * otherwise a RepositoryException is thrown.
     *
     * If ordering is supported by the node type of the parent node of the new
     * node then the new node is appended to the end of the child node list.
     *
     * If $primaryNodeTypeName is specified, this type will be used (or a
     * ConstraintViolationException thrown if this child type is not allowed).
     * Otherwise the new node's primary node type will be determined by the
     * child node definitions in the node types of its parent. This may occur
     * either immediately, on dispatch (save, whether within or without
     * transactions) or on persist (save without transactions, commit within
     * a transaction), depending on the implementation.
     *
     * @param string $relPath The path of the new node to be created.
     * @param string $primaryNodeTypeName The name of the primary node type of
     *      the new node. Optional.
     *
     * @return NodeInterface The node that was added.
     *
     * @throws ItemExistsException if an item at the specified path
     *      already exists, same-name siblings are not allowed and this
     *      implementation performs this validation immediately.
     * @throws PathNotFoundException if the specified path implies
     *      intermediary Nodes that do not exist or the last element of relPath
     *      has an index, and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\NodeType\ConstraintViolationException if a node type or
     *      implementation-specific constraint is violated or if an attempt is
     *      made to add a node as the child of a property and this
     *      implementation performs this validation immediately.
     * @throws \PHPCR\Version\VersionException if the node to which the new
     *      child is being added is read-only due to a checked-in node and this
     *      implementation performs this validation immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the addition of the
     *      node and this implementation performs this validation immediately
     *      instead of waiting until save.
     * @throws \InvalidArgumentException if $relPath is an absolute path
     * @throws RepositoryException       if the last element of relPath has an
     *      index or if another error occurs.
     *
     * @api
     */
    public function addNode($relPath, $primaryNodeTypeName = null)
    {
        return $this;
    }

    /**
     * Adds a new node with a system-generated name as a direct child of this
     * node and returns the new node. The name of the new node is a
     * system-created JCR name that differs from the names of all currently
     * persisted child nodes and properties of this node. If present, the
     * nameHint is used as the basis for the name of the new node.
     *
     * This is a session-write method, meaning that the addition of the new
     * node is dispatched upon Session::save
     *
     * For the method to successfully add the new child node, the effective
     * node type of this node must permit <i>residual child nodes</i> (see
     * section 3.7.2.1 of the JCR 2.1 specification). If this condition is not
     * met, a ConstraintViolationException will be thrown either immediately,
     * on dispatch (save, whether within or without transactions) or on persist
     * (save without transactions, commit within a transaction).
     * Implementations may differ on when this validation is performed.
     *
     * A VersionException will be thrown either immediately, on dispatch (save,
     * whether within or without transactions) or on persist (save without
     * transactions, commit within a transaction), if the node to which the new
     * child is being added is read-only due to a checked-in node.
     * Implementations may differ on when this validation is performed.
     *
     * A LockException will be thrown either immediately, on dispatch (save,
     * whether within or without transactions) or on persist (save without
     * transactions, commit within a transaction), if a lock prevents the
     * addition of the node. Implementations may differ on when this validation
     * is performed.
     *
     * The new node's primary node type will be determined by the residual
     * child node definitions in the node type of this node. This may occur
     * either immediately, on dispatch (save, whether within or without
     * transactions) or on persist (save without transactions, commit within a
     * transaction), depending on the implementation.
     *
     * If ordering is supported by the node type of this node then the new node
     * is appended to the end of the child node list.
     *
     * The behavior of name generation for the new node depends on the form of the
     * $nameHint parameter. If $nameHint is:
     * <ol>
     * <li>null: The new node name will be generated entirely by the repository.
     * The namespace used for the new name may depend on implementation-specific
     * configuration.</li>
     * <li>"" (the empty string), ":" (colon) or "{}": The new node name will
     * be in the empty namespace and the local part of the name will be
     * generated by the repository.</li>
     * <li>"<i>somePrefix</i>:" where <i>somePrefix</i> is a syntactically
     * valid namespace prefix: The repository will attempt to create a name in
     * the namespace represented by that prefix. If the prefix specified does
     * not exist, then a NameSpaceException is thrown either immediately, on
     * dispatch (save, whether within or without transactions) or on persist
     * (save without transactions, commit within a transaction).
     * If the prefix does exist then the local part of the name is generated by
     * the repository.</li>
     * <li>"{<i>someURI</i>}" where <i>someURI</i> is a syntactically valid
     * namespace URI: The repository will attempt to create a name in the
     * namespace specified. If that namespace has no existing local mapping to
     * a prefix then one is automatically created (as per section 3.5.2 of the
     * JCR specification). The local part of the name is generated by the
     * repository.</li>
     * <li>"<i>somePrefix</i>:<i>localNameHint</i>" where <i>somePrefix</i> is
     * a syntactically valid namespace prefix and <i>localNameHint</i> is
     * syntactically valid local name: The repository will attempt to create a
     * name in the namespace represented by that prefix as described in (3),
     * above. The local part of the name is generated by the repository using
     * <i>localNameHint</i> as a basis. The way in which the local name is
     * constructed from the hint may vary across implementations.</li>
     * <li>"{<i>someURI</i>}<i>localNameHint</i>" where <i>someURI</i> is a
     * syntactically valid namespace URI and <i>localNameHint</i> is
     * syntactically valid local name: The repository will attempt to create a
     * name in the namespace specified as described in (4), above. The local
     * part of the name is generated by the repository using <i>localNameHint</i>
     * as a basis. The way in which the local name is constructed from the hint
     * may vary across implementations.</li>
     * </ol>
     *
     * @param string $nameHint A string to be used as the basis for the created
     *      name or null.
     * @param string $primaryNodeTypeName The primary node type of the new node
     *      or null to have the type guessed.
     *
     * @return NodeInterface The newly created node.
     *
     * @throws \PHPCR\NodeType\ConstraintViolationException if this node does
     *      not allow residual child nodes and this implementation performs
     *      this validation immediately.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the addition of the
     *      node and this implementation performs this validation immediately.
     * @throws NamespaceException if a namespace prefix is provided in the
     *      $nameHint which does not exist and this implementation performs
     *      this validation immediately.
     *
     * @since JCR 2.1
     */
    public function addNodeAutoNamed($nameHint = null, $primaryNodeTypeName = null)
    {
        // TODO: Implement addNodeAutoNamed() method.
    }

    /**
     * Insert a child node before another child identified by its path.
     *
     * If this node supports child node ordering, this method inserts the child
     * node at srcChildRelPath into the child node list at the position
     * immediately before destChildRelPath.
     *
     * To place the node srcChildRelPath at the end of the list, a
     * destChildRelPath of null is used.
     *
     * Note that (apart from the case where destChildRelPath is null) both of
     * these arguments must be relative paths of depth one, in other words they
     * are the names of the child nodes, possibly suffixed with an index.
     *
     * If srcChildRelPath and destChildRelPath are the same, then no change is
     * made.
     *
     * This is session-write method, meaning that a change made by this method
     * is dispatched on save.
     *
     * @param string $srcChildRelPath the relative path to the child node (that
     *      is, name plus possible index) to be moved in the ordering
     * @param string $destChildRelPath the the relative path to the child node
     *      (that is, name plus possible index) before which the node
     *      srcChildRelPath will be placed.
     *
     * @throws UnsupportedRepositoryOperationException if ordering is
     *      not supported on this node.
     * @throws \PHPCR\NodeType\ConstraintViolationException if an implementation-
     *      specific ordering restriction is violated and this implementation
     *      performs this validation immediately instead of waiting until save.
     * @throws ItemNotFoundException if either parameter is not the
     *      relative path of a child node of this node.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the re-ordering and
     *      this implementation performs this validation immediately.
     * @throws \InvalidArgumentException if $srcChildRelPath is an absolute path
     *      or $destChildRelPath is non-null and any of the two paths is of
     *      depth more than 1.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function orderBefore($srcChildRelPath, $destChildRelPath)
    {
        // TODO: Implement orderBefore() method.
    }

    /**
     * Renames this node to the specified newName. The ordering (if any) of
     * this node among it siblings remains unchanged.
     *
     * This is a session-write method, meaning that the name change is
     * dispatched upon Session::save.
     *
     * The $newName provided must not have an index, otherwise a
     * RepositoryException is thrown.
     *
     * An ItemExistsException will be thrown either immediately, on dispatch
     * (save, whether within or without transactions) or on persist (save
     * without transactions, commit within a transaction), if there already
     * exists a sibling item of this node with the specified name and
     * same-name-siblings are not allowed. Implementations may differ on when
     * this validation is performed.
     *
     * A ConstraintViolationException will be thrown either immediately, on
     * dispatch (save, whether within or without transactions) or on persist
     * (save without transactions, commit within a transaction), if changing
     * the name would violate a node type or implementation-specific
     * constraint. Implementations may differ on when this validation is
     * performed.
     *
     * A VersionException will be thrown either immediately, on dispatch (save,
     * whether within or without transactions) or on persist (save without
     * transactions, commit within a transaction), if this node is read-only
     * due to a checked-in node. Implementations may differ on when this
     * validation is performed.
     *
     * A LockException will be thrown either immediately, on dispatch (save,
     * whether within or without transactions) or on persist (save without
     * transactions, commit within a transaction), if a lock prevents the name
     * change of the node. Implementations may differ on when this validation
     * is performed.
     *
     * @param string $newName The new name of this node.
     *
     * @throws ItemExistsException if there already exists a sibling item of
     *      this node with the specified name, same-name siblings are not
     *      allowed and this implementation performs this validation immediately.
     * @throws \PHPCR\NodeType\ConstraintViolationException if a node type or
     *      implementation-specific constraint is violated and this
     *      implementation performs this validation immediately.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the name change and
     *      this implementation performs this validation immediately.
     * @throws RepositoryException If $newName has an index or if another error
     *      occurs.
     *
     * @since JCR 2.1
     */
    public function rename($newName)
    {
        // TODO: Implement rename() method.
    }

    /**
     * Defines a value for a property identified by its name.
     *
     * Sets the property of this node called $name to the specified value.
     * This method works as factory method to create new properties and as a
     * shortcut for PropertyInterface::setValue()
     *
     * The type detection logic is exactly the same as in
     * PropertyInterface::setValue
     *
     * If the property does not yet exist, it is created and its property type
     * determined by the node type of this node. If, based on the name and
     * value passed, there is more than one property definition that applies,
     * the repository chooses one definition according to some implementation-
     * specific criteria.
     *
     * Once property with name P has been created, the behavior of a subsequent
     * setProperty($p,$v) may differ across implementations. Some repositories
     * may allow P to be dynamically re-bound to a different property
     * definition (based for example, on the new value being of a different
     * type than the original value) while other repositories may not allow
     * such dynamic re-binding.
     *
     * Passing a null as the second parameter removes the property. It is
     * equivalent to calling remove on the Property object itself. For example,
     * $n->setProperty("P", null) would remove property called "P" of the
     * node $n.
     *
     * This is a session-write method, meaning that changes made through this
     * method are dispatched on SessionInterface::save().
     *
     * If $type is given:
     * The behavior of this method is identical to that of setProperty($name,
     * $value) except that the intended property type is explicitly specified.
     *
     * <b>Note:</b>
     * Have a look at the JSR-283 spec and/or API documentation for more details
     * on what is supposed to happen for different types of values being passed
     * to this method.
     *
     * @param string $name The name of a property of this node
     * @param mixed $value The value to be assigned
     * @param integer $type The type to set for the property, optional. Must be
     *      a constant from {@link PropertyType}
     *
     * @return PropertyInterface The new resp. updated Property object
     *
     * @throws ValueFormatException if the specified property is a DATE
     *      but the value cannot be expressed in the ISO 8601-based format
     *      defined in the JCR 2.0 specification and the implementation does
     *      not support dates incompatible with that format or if value cannot
     *      be converted to the type of the specified property or if the
     *      property already exists and is multi-valued.
     * @throws \PHPCR\Version\VersionException if this node is versionable and
     *      checked-in or is non-versionable but its nearest versionable
     *      ancestor is checked-in and this implementation performs this
     *      validation immediately instead of waiting until save.
     * @throws \PHPCR\Lock\LockException if a lock prevents the setting of the
     *      property and this implementation performs this validation
     *      immediately instead of waiting until save.
     * @throws \PHPCR\NodeType\ConstraintViolationException if the change would violate
     *      a node-type or other constraint and this implementation performs
     *      this validation immediately instead of waiting until save.
     * @throws UnsupportedRepositoryOperationException if the type
     *      parameter is set and different from the current type and this
     *      implementation does not support dynamic re-binding
     * @throws RepositoryException if another error occurs.
     *
     * @see PropertyInterface::setValue()
     *
     * @api
     */
    public function setProperty($name, $value, $type = null)
    {
        // TODO: Implement setProperty() method.
    }

    /**
     * Returns the node at relPath relative to this node.
     *
     * If relPath contains a path element that refers to a node with same-name
     * sibling nodes without explicitly including an index using the
     * array-style notation ([x]), then the index [1] is assumed (indexing of
     * same name siblings begins at 1, not 0, in order to preserve
     * compatibility with XPath).
     *
     * Within the scope of a single Session object, if a Node object has been
     * acquired, any subsequent call of getNode reacquiring the same node must
     * return a Node object reflecting the same state as the earlier Node
     * object. Whether this object is actually the same Node instance, or
     * simply one wrapping the same state, is up to the implementation.
     *
     * @param string $relPath The relative path of the node to retrieve.
     *
     * @return NodeInterface The node at relPath.
     *
     * @throws PathNotFoundException if no node exists at the specified
     *      path or the current Session does not read access to the node at
     *      the specified path, or if $relPath is an absolute path
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getNode($relPath)
    {
        // TODO: Implement getNode() method.
    }

    /**
     * Get a set of direct child nodes, optionally filtered by node name and/or
     * primary or mixin node type.
     *
     * This method only returns child nodes, never properties of this node.
     * If no filters are specified, all accessible child nodes are returned.
     *
     * Get all child nodes C of this node where:
     * <ul>
     *    <li>C is accessible through the current Session</li>
     *    <li>If the nameFilter is not null, C must match at least one of the
     *      filter expressions.</li>
     *   <li>If the typeFilter is not null, C must be of a node type T that
     *      matches (by wildcard expansion) at least one of the typeFilters.
     *   </li>
     * </ul>
     *
     * The filter can be a single filter expression or an array of filters. The
     * filter pattern syntax is simply full or partial names with one or more
     * wildcard characters ("*", also called glob).
     * Note that leading and trailing whitespace around a filter pattern is
     * taken into account.
     *
     * For example,
     *
     *  <code>N->getNodes("jcr:*")</code>
     *
     * would return an iterator holding all accessible child nodes of N that
     * are begin with the prefix 'jcr:'.
     *
     *  <code>N->getNodes(array("jcr:*", "myapp:report", "my doc"))</code>
     *
     * would return an iterator holding all accessible child nodes of N that
     * are either called 'myapp:report', begin with the prefix 'jcr:' or are
     * called 'my doc'.
     *
     * The pattern is matched against the names (not the paths) of the
     * immediate child nodes of this node.
     *
     * If the child nodes of this node have an order then the names are
     * returned in that order, otherwise the order is undefined.
     *
     * If this node has no accessible matching child nodes, then an empty
     * iterator is returned.
     *
     * Note that a match succeeds against a given name if a glob matches either
     * or both of its qualified or expanded forms.
     *
     * The same reacquisition semantics apply as with getNode($relPath).
     *
     * @param string|array $nameFilter a filter or an array of filters for the
     *      node names to find.
     * @param string|array $typeFilter a filter or an array of filters for the
     *      node type names to find.
     *
     * @return \Iterator over all (matching) child Nodes implementing
     *      <b>SeekableIterator</b> and <b>Countable</b>. Keys are the Node
     *      names, values the corresponding NodeInterface instances.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getNodes($nameFilter = null, $typeFilter = null)
    {
        // TODO: Implement getNodes() method.
    }

    /**
     * Returns the names of direct child nodes of this node accessible through
     * the current <code>Session</code>. Does <i>not</i> include the names of the
     * properties of this <code>Node</code>. If the child nodes of this node
     * have an order then the names are returned in that order, otherwise the
     * order is undefined.
     *
     * If this node has no accessible child nodes, then an empty iterator is
     * returned.
     *
     * The optional $nameFilter and $typeFilter follow the same semantics as
     * the corresponding parameters of NodeInterface::getNodes()
     *
     * If the child nodes of this node are ordered, then the names are
     * returned in that order, otherwise the order is undefined.
     *
     * If this node has no accessible matching child nodes, then an empty
     * iterator is returned.
     *
     * Note that a match succeeds against a given name respectively type if a
     * glob matches either or both of its qualified or expanded forms.
     *
     * @param string|array $nameFilter a filter or an array of filters for the
     *      node names to find.
     * @param string|array $typeFilter a filter or an array of filters for the
     *      node type names to find.
     *
     * @return \Iterator over all child node names
     *
     * @throws RepositoryException if an error occurs.
     *
     * @since JCR 2.1
     */
    public function getNodeNames($nameFilter = null, $typeFilter = null)
    {
        // TODO: Implement getNodeNames() method.
    }

    /**
     * Returns the property at relPath relative to this node.
     *
     * The same reacquisition semantics apply as with getNode(String).
     *
     * @param string $relPath The relative path of the property to retrieve.
     *
     * @return PropertyInterface The property at relPath.
     *
     * @throws PathNotFoundException if no property exists at the
     *      specified path or if the current Session does not have read access
     *      to the specified property.
     * @throws \InvalidArgumentException if $relPath is an absolute path
     * @throws RepositoryException       if another error occurs.
     *
     * @api
     */
    public function getProperty($relPath)
    {
        // TODO: Implement getProperty() method.
    }

    /**
     * Returns the property of this node with name $name.
     *
     * If $type is set, attempts to convert the value to the specified type.
     * This is a shortcut for getProperty()->getXX()
     *
     * @param string $name Name of this property
     * @param integer $type Type conversion request, optional. Must be a
     *      constant from {@link PropertyType}
     *
     * @return mixed The value of the property with $name.
     *
     * @throws PathNotFoundException if no property exists at the
     *      specified path or if the current Session does not have read access
     *      to the specified property.
     * @throws ValueFormatException if the type or format of the
     *      property can not be converted to the specified type.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getPropertyValue($name, $type = null)
    {
        // TODO: Implement getPropertyValue() method.
    }

    /**
     * If there is a property at $relPath, this method behaves exactly as
     * getPropertyValue with no specified type.
     *
     * If no property is found at the specified $relPath,
     * then $defaultValue is returned.
     *
     * The same reacquisition semantics apply as with getProperty()
     *
     * @param string $relPath the relative path to the desired property
     * @param mixed $defaultValue the default value if no property $name exists
     *
     * @return mixed the value of the property at $relPath or $defaultValue
     *
     * @throws RepositoryException if an unexpected error occurs.
     *
     * @since JCR 2.1
     */
    public function getPropertyValueWithDefault($relPath, $defaultValue)
    {
        // TODO: Implement getPropertyValueWithDefault() method.
    }

    /**
     * Get an iterator of properties of this node, potentially filtered by
     * name.
     *
     * This method only returns properties, never child nodes of this node.
     * If no filters are specified, all accessible properties are returned.
     *
     * Gets all properties of this node accessible through the current Session.
     * If $nameFilter is specified, the property names must match the pattern.
     * A pattern may be a full name or a partial name with one or more wildcard
     * characters ("*"). For example,
     *
     *  <code>$n->getProperties("jcr:*")</code>
     *
     * would return an iterator holding all accessible properties of $n that
     * begin with the prefix 'jcr:'.
     *
     *  <code>$n->getProperties(array("jcr:*", "myapp:report", "my doc"))</code>
     *
     * would return an iterator holding all accessible properties of $n that
     * are either called 'myapp:report', begin with the prefix 'jcr:' or are
     * called 'my doc'.
     *
     * The pattern is matched against the names (not the paths) of the
     * properties of this node.
     *
     * Note that a match succeeds against a given name if a glob matches either
     * or both of its qualified or expanded forms.
     *
     * If this node has no accessible matching properties, then an empty
     * iterator is returned.
     *
     * The same reacquisition semantics apply as with getProperty().
     *
     * @param string|array $nameFilter a name pattern
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and
     *      <b>Countable</b>. Keys are the property names, values the
     *      corresponding PropertyInterface instances.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getProperties($nameFilter = null)
    {
        // TODO: Implement getProperties() method.
    }

    /**
     * Shortcut for getProperties and then getting the values of the properties.
     *
     * Apart from returning php native values instead of properties, this
     * method has the same semantics as getProperties()
     *
     * To improve performance, implementations should avoid instantiating the
     * property objects for this method
     *
     * @param string|array $nameFilter a name pattern
     * @param boolean $dereference whether to dereference REFERENCE,
     *      WEAKREFERENCE and PATH properties or just return id/path strings
     *
     * @return array Keys are the property names, values the corresponding
     *   property value (or array of values in case of multi-valued properties)
     *   If $dereference is false, reference properties are uuid strings and
     *   path properties path strings instead of the referenced node instances.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @see NodeInterface::getProperties()
     *
     * @api
     */
    public function getPropertiesValues($nameFilter = null, $dereference = true)
    {
        // TODO: Implement getPropertiesValues() method.
    }

    /**
     * Returns the primary child item of the current node.
     *
     * The primary node type of this node may specify one child item (child
     * node or property) of this node as the primary child item. This method
     * returns that item.
     *
     * In cases where the primary child item specifies the name of a set
     * same-name sibling child nodes, the node returned will be the one among
     * the same-name siblings with index [1].
     *
     * The same reacquisition semantics apply as with getNode(String).
     *
     * @return ItemInterface the primary child item.
     *
     * @throws ItemNotFoundException if this node does not have a
     *      primary child item, either because none is declared in the node
     *      type or because a declared primary item is not present on this node
     *      instance, or because none accessible through the current Session
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getPrimaryItem()
    {
        // TODO: Implement getPrimaryItem() method.
    }

    /**
     * Returns the identifier of the current node.
     *
     * Applies to both referenceable and non-referenceable nodes.
     *
     * @return string the identifier of this node
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * This method returns the index of this node within the ordered set of its
     * same-name sibling nodes.
     *
     * This index is the one used to address same-name siblings using the
     * square-bracket notation, e.g., /a[3]/b[4]. Note that the index always
     * starts at 1 (not 0), for compatibility with XPath. As a result, for
     * nodes that do not have same-name-siblings, this method will always
     * return 1.
     *
     * @return integer The index of this node within the ordered set of its
     *      same-name sibling nodes.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getIndex()
    {
        // TODO: Implement getIndex() method.
    }

    /**
     * This method returns all REFERENCE properties that refer to this node,
     * have the specified name and that are accessible through the current
     * Session.
     *
     * If the name parameter is null then all referring REFERENCES are returned
     * regardless of name.
     *
     * Some implementations may only return properties that have been
     * persisted. Some may return both properties that have been persisted and
     * those that have been dispatched but not persisted (for example, those
     * saved within a transaction but not yet committed) while others
     * implementations may return these two categories of property as well as
     * properties that are still pending and not yet dispatched.
     *
     * In implementations that support versioning, this method does not return
     * properties that are part of the frozen state of a version in version
     * storage.
     *
     * If this node has no referring properties with the specified name, an
     * empty iterator is returned.
     *
     * @param string $name Name of referring REFERENCE properties to be
     *      returned; if null then all referring REFERENCEs are returned.
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and
     *      <b>Countable</b>. Keys are the property names, values the
     *      corresponding PropertyInterface instances.
     *
     * @throws RepositoryException if an error occurs
     *
     * @api
     */
    public function getReferences($name = null)
    {
        // TODO: Implement getReferences() method.
    }

    /**
     * This method returns all WEAKREFERENCE properties that refer to this
     * node, have the specified name and that are accessible through the
     * current Session.
     *
     * If the name parameter is null then all referring WEAKREFERENCE are
     * returned regardless of name.
     *
     * Some level 2 implementations may only return properties that have been
     * saved (in a transactional setting this includes both those properties
     * that have been saved but not yet committed, as well as properties that
     * have been committed). Other level 2 implementations may additionally
     * return properties that have been added within the current Session but
     * are not yet saved.
     *
     * In implementations that support versioning, this method does not return
     * properties that are part of the frozen state of a version in version
     * storage.
     *
     * If this node has no referring properties with the specified name, an
     * empty iterator is returned.
     *
     * @param string $name name of referring WEAKREFERENCE properties to be
     *      returned; if null then all referring WEAKREFERENCEs are returned
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and
     *      <b>Countable</b>. Keys are the property names, values the
     *      corresponding PropertyInterface instances.
     *
     * @throws RepositoryException if an error occurs
     *
     * @api
     */
    public function getWeakReferences($name = null)
    {
        // TODO: Implement getWeakReferences() method.
    }

    /**
     * Indicates whether a node exists at relPath
     *
     * Returns true if a node accessible through the current Session exists at
     * relPath and false otherwise.
     *
     * @param string $relPath The path of a (possible) node.
     *
     * @return boolean true if a node exists at relPath; false otherwise.
     *
     * @throws \InvalidArgumentException if $relPath is an absolute path
     * @throws RepositoryException       if an error occurs.
     *
     * @api
     */
    public function hasNode($relPath)
    {
        // TODO: Implement hasNode() method.
    }

    /**
     * Indicates whether a property exists at relPath.
     *
     * Returns true if a property accessible through the current Session exists
     * at relPath and false otherwise.
     *
     * @param string $relPath The path of a (possible) property.
     *
     * @return boolean true if a property exists at relPath; false otherwise.
     *
     * @throws \InvalidArgumentException if $relPath is an absolute path
     * @throws RepositoryException       if an error occurs.
     *
     * @api
     */
    public function hasProperty($relPath)
    {
        // TODO: Implement hasProperty() method.
    }

    /**
     * Indicates whether this node has any child nodes.
     *
     * Returns true if this node has one or more child nodes accessible through
     * the current Session; false otherwise.
     *
     * @return boolean true if this node has one or more child nodes; false
     *      otherwise.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function hasNodes()
    {
        // TODO: Implement hasNodes() method.
    }

    /**
     * Indicates whether this node has properties.
     *
     * Returns true if this node has one or more properties accessible through
     * the current Session; false otherwise.
     *
     * @return boolean true if this node has one or more properties; false
     *      otherwise.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function hasProperties()
    {
        // TODO: Implement hasProperties() method.
    }

    /**
     * Returns the primary node type in effect for this node.
     *
     * Which NodeType is returned when this method is called on the root node
     * of a workspace is up to the implementation.
     *
     * @return \PHPCR\NodeType\NodeTypeInterface a NodeType object.
     *
     * @throws RepositoryException if an error occurs
     *
     * @api
     */
    public function getPrimaryNodeType()
    {
        // TODO: Implement getPrimaryNodeType() method.
    }

    /**
     * Returns an array of NodeType objects representing the mixin node types
     * in effect for this node.
     *
     * This includes only those mixin types explicitly assigned to this node.
     * It does not include mixin types inherited through the addition of
     * supertypes to the primary type hierarchy or through the addition of
     * supertypes to the type hierarchy of any of the declared mixin types.
     *
     * @return NodeTypeInterface[] an array of mixin node types
     *
     * @throws RepositoryException if an error occurs
     *
     * @api
     */
    public function getMixinNodeTypes()
    {
        // TODO: Implement getMixinNodeTypes() method.
    }

    /**
     * Returns true if this node is of the specified primary node type or mixin
     * type, or a subtype thereof.
     *
     * Returns false otherwise. This method respects the effective node type of
     * the node.
     *
     * @param string $nodeTypeName the name of a node type.
     *
     * @return boolean true if this node is of the specified primary node type
     *            or mixin type, or a subtype thereof. Returns false otherwise.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function isNodeType($nodeTypeName)
    {
        // TODO: Implement isNodeType() method.
    }

    /**
     * Changes the primary node type of this node to nodeTypeName.
     *
     * Also immediately changes this node's jcr:primaryType property
     * appropriately. Semantically, the new node type may take effect
     * immediately or on dispatch but must take effect on persist. Whichever
     * behavior is adopted it must be the same as the behavior adopted for
     * addMixin() (see below) and the behavior that occurs when a node is first
     * created.
     *
     * @param string $nodeTypeName the name of the new node type.
     *
     * @throws \PHPCR\NodeType\ConstraintViolationException if the specified primary
     *      node type creates a type conflict and this implementation performs
     *      this validation immediately.
     * @throws \PHPCR\NodeType\NoSuchNodeTypeException if the specified
     *      nodeTypeName is not recognized and this implementation performs
     *      this validation immediately.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the change of the
     *      primary node type and this implementation performs this validation
     *      immediately.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function setPrimaryType($nodeTypeName)
    {
        // TODO: Implement setPrimaryType() method.
    }

    /**
     * Adds the mixin node type named $mixinName to this node.
     *
     * If this node is already of type $mixinName (either due to a previously
     * added mixin or due to its primary type, through inheritance) then this
     * method has no effect. Otherwise $mixinName is added to this node's
     * jcr:mixinTypes property.
     *
     * Semantically, the new node type may take effect immediately, on dispatch
     * or on persist. The behavior is adopted must be the same as the behavior
     * adopted for NodeInterface::setPrimaryType() and the behavior that
     * occurs when a node is first created.
     *
     * A ConstraintViolationException is thrown either immediately or on save
     * if a conflict with another assigned mixin or the primary node type
     * occurs or for an implementation-specific reason. Implementations may
     * differ on when this validation is done.
     *
     * In some implementations it may only be possible to add mixin types
     * before a a node is persisted for the first time. In such cases any
     * later calls to $addMixin will throw a ConstraintViolationException
     * either immediately, on dispatch or on persist.
     *
     * @param string $mixinName the name of the mixin node type to be added
     *
     * @throws \PHPCR\NodeType\NoSuchNodeTypeException if the specified
     *      mixinName is not recognized and this implementation performs this
     *      validation immediately instead of waiting until save.
     * @throws \PHPCR\NodeType\ConstraintViolationException if the specified mixin node
     *      type is prevented from being assigned.
     * @throws \PHPCR\Version\VersionException if this node is versionable and
     *      checked-in or is non-versionable but its nearest versionable
     *      ancestor is checked-in and this implementation performs this
     *      validation immediately instead of waiting until save.
     * @throws \PHPCR\Lock\LockException if a lock prevents the addition of the
     *      mixin and this implementation performs this validation immediately
     *      instead of waiting until save.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function addMixin($mixinName)
    {
        // TODO: Implement addMixin() method.
    }

    /**
     * Removes the specified mixin node type from this node and removes
     * mixinName from this node's jcr:mixinTypes property.
     *
     * Both the semantic change in effective node type and the persistence of
     * the change to the jcr:mixinTypes  property occur on persist.
     *
     * @param string $mixinName the name of the mixin node type to be removed.
     *
     * @throws \PHPCR\NodeType\NoSuchNodeTypeException if the specified
     *      mixinName is not currently assigned to this node and this
     *      implementation performs this validation immediately.
     * @throws \PHPCR\NodeType\ConstraintViolationException if the specified mixin node
     *      type is prevented from being removed and this implementation
     *      performs this validation immediately.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the removal of the
     *      mixin and this implementation performs this validation immediately.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function removeMixin($mixinName)
    {
        // TODO: Implement removeMixin() method.
    }

    /**
     * Sets this node's mixin node types to those named in $mixinNames and sets
     * this node's jcr:mixinTypes property accordingly. Any previous mixins are
     * removed.
     *
     * Semantically, the new node type <i>may</i> take effect immediately, on
     * dispatch or on persist. The behavior adopted must be the same as the
     * behavior adopted for setPrimaryType and the behavior that occurs when a
     * node is first created.
     *
     * This method adds (and if necessary removes) mixins in a single atomic
     * step, avoiding constraint violations that might occur if the steps were
     * done individually. This can be useful when changing node types while
     * preserving existing content.
     *
     * A <code>ConstraintViolationException</code> is thrown either immediately,
     * on dispatch or on persist, if a conflict occurs within the set of
     * assigned mixins or the primary node type or for an implementation-specific
     * reason. Implementations may differ on when this validation is done.
     *
     * In some implementations it may only be possible to set mixin types before
     * a node is persisted <i>for the first time</i>. In such cases any later
     * calls to setMixins will throw a ConstraintViolationException
     * either immediately, on dispatch or on persist.
     *
     * A NoSuchNodeTypeException is thrown either immediately, on dispatch or
     * on persist, if one or more of the specified $mixinNames are not
     * recognized. Implementations may differ on when this validation is done.
     *
     * A VersionException is thrown either immediately, on dispatch
     * or on persist, if this node is read-only due to a checked-in node.
     * Implementations may differ on when this validation is done.
     *
     * A LockException is thrown either immediately, on dispatch or on persist,
     * if a lock prevents the assignment of the mixins. Implementations may
     * differ on when this validation is done.
     *
     * @param array $mixinNames the names of the mixin node types to be set
     *
     * @throws \PHPCR\NodeType\NoSuchNodeTypeException If one or more of the
     *      specified $mixinNames are not recognized and this implementation
     *      performs this validation immediately.
     * @throws \PHPCR\NodeType\ConstraintViolationException if the specified
     *      mixin node types create a conflict and this implementation performs
     *      this validation immediately.
     * @throws \PHPCR\Version\VersionException if this node is read-only due to
     *      a checked-in node and this implementation performs this validation
     *      immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the assignment of
     *      the mixins and this implementation performs this validation
     *      immediately.
     * @throws RepositoryException if another error occurs.
     *
     * @since JCR 2.1
     */
    public function setMixins(array $mixinNames)
    {
        // TODO: Implement setMixins() method.
    }

    /**
     * Determine if a mixin node type may be added to the current node.
     *
     * Returns true if the specified mixin node type called $mixinName can be
     * added to this node. Returns false otherwise. A result of false must be
     * returned in each of the following cases:
     *
     * - The mixin's definition conflicts with an existing primary or mixin
     *   node type of this node.
     * - This node is versionable and checked-in or is non-versionable and
     *   its nearest versionable ancestor is checked-in.
     * - This node is protected (as defined in this node's NodeDefinition,
     *   found in the node type of this node's parent).
     * - An access control restriction would prevent the addition of the mixin.
     * - A lock would prevent the addition of the mixin.
     * - An implementation-specific restriction would prevent the addition of
     *   the mixin.
     *
     * @param string $mixinName The name of the mixin to be tested.
     *
     * @return boolean true if the specified mixin node type, mixinName, can be
     *      added to this node; false otherwise.
     *
     * @throws \PHPCR\NodeType\NoSuchNodeTypeException if the specified mixin
     *      node type name is not recognized.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function canAddMixin($mixinName)
    {
        // TODO: Implement canAddMixin() method.
    }

    /**
     * Returns the node definition that applies to this node.
     *
     * In some cases there may appear to be more than one definition that could
     * apply to this node.
     * However, it is assumed that upon creation of this node, a single particular
     * definition was used and it is that definition that this method returns.
     * How this governing definition is selected upon node creation from among
     * others which may have been applicable is an implementation issue and is
     * not covered by this specification. The NodeDefinition returned when this
     * method is called on the root node of a workspace is also up to the
     * implementation.
     *
     * @return \PHPCR\NodeType\NodeDefinitionInterface a NodeDefinition object.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getDefinition()
    {
        // TODO: Implement getDefinition() method.
    }

    /**
     * Updates a node corresponding to the current one in the given workspace.
     *
     * If this node does have a corresponding node in the workspace
     * srcWorkspace, then this replaces this node and its subgraph with a clone
     * of the corresponding node and its subgraph.
     * If this node does not have a corresponding node in the workspace
     * srcWorkspace, then the update method has no effect.
     *
     * If the update succeeds the changes made are persisted immediately, there
     * is no need to call save.
     *
     * Note that update does not respect the checked-in status of nodes. An
     * update may change a node even if it is currently checked-in (This fact
     * is only relevant in an implementation that supports versioning).
     *
     * @param string $srcWorkspace the name of the source workspace.
     *
     * @throws NoSuchWorkspaceException  if srcWorkspace does not exist.
     * @throws InvalidItemStateException if this Session (not
     *      necessarily this Node) has pending unsaved changes.
     * @throws AccessDeniedException if the current session does not
     *      have sufficient access to perform the operation.
     * @throws \PHPCR\Lock\LockException if a lock prevents the update.
     * @throws RepositoryException       if another error occurs.
     *
     * @api
     */
    public function update($srcWorkspace)
    {
        // TODO: Implement update() method.
    }

    /**
     * Returns the absolute path of the node in the specified workspace that
     * corresponds to this node.
     *
     * @param string $workspaceName the name of the workspace.
     *
     * @return string the absolute path to the corresponding node.
     *
     * @throws ItemNotFoundException    if no corresponding node is found.
     * @throws NoSuchWorkspaceException if the workspace is unknown.
     * @throws AccessDeniedException    if the current session has
     *      insufficient access capabilities to perform this operation.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getCorrespondingNodePath($workspaceName)
    {
        // TODO: Implement getCorrespondingNodePath() method.
    }

    /**
     * Returns an iterator over all nodes that are in the shared set of this
     * node.
     *
     * If this node is not shared then the returned iterator contains only this
     * node.
     *
     * @return \Iterator implementing <b>SeekableIterator</b> and
     *      <b>Countable</b>. Keys are the Node names, values the corresponding
     *      NodeInterface instances.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function getSharedSet()
    {
        // TODO: Implement getSharedSet() method.
    }

    /**
     * Removes this node and every other node in the shared set of this node.
     *
     * This removal must be done atomically, i.e., if one of the nodes cannot
     * be removed, the method throws the exception NodeInterface::remove()
     * would have thrown in that case, and none of the nodes are removed.
     *
     * If this node is not shared this method removes only this node.
     *
     * @throws \PHPCR\Version\VersionException if the parent node of this item
     *      is versionable and checked-in or is non-versionable but its nearest
     *      versionable ancestor is checked-in and this implementation performs
     *      this validation immediately.
     * @throws \PHPCR\Lock\LockException if a lock prevents the removal of this
     *      item and this implementation performs this validation immediately.
     * @throws \PHPCR\NodeType\ConstraintViolationException if removing the
     *      specified item would violate a node type or implementation-specific
     *      constraint and this implementation performs this validation immediately.
     * @throws RepositoryException if another error occurs.
     *
     * @see removeShare()
     * @see Item::remove()
     * @see SessionInterface::removeItem()
     *
     * @api
     */
    public function removeSharedSet()
    {
        // TODO: Implement removeSharedSet() method.
    }

    /**
     * Removes this node, but does not remove any other node in the shared set
     * of this node.
     *
     * @throws \PHPCR\Version\VersionException if the parent node of this item
     *      is versionable and checked-in or is non-versionable but its nearest
     *      versionable ancestor is checked-in and this implementation performs
     *      this validation immediately instead of waiting until save.
     * @throws \PHPCR\Lock\LockException if a lock prevents the removal of this
     *      item and this implementation performs this validation immediately
     *      instead of waiting until save.
     * @throws \PHPCR\NodeType\ConstraintViolationException if removing the
     *      specified item would violate a node type or implementation-specific
     *      constraint and this implementation performs this validation
     *      immediately instead of waiting until save.
     * @throws RepositoryException if this node cannot be removed
     *      without removing another node in the shared set of this node or
     *      another error occurs.
     *
     * @see removeSharedSet()
     * @see Item::remove()
     * @see SessionInterface::removeItem
     *
     * @api
     */
    public function removeShare()
    {
        // TODO: Implement removeShare() method.
    }

    /**
     * Determine if the current node is currently checked out.
     *
     * Returns false if this node is currently in the checked-in state (either
     * due to its own status as a versionable node or due to the effect of
     * a versionable node being checked in above it). Otherwise this method
     * returns true. This includes the case where the repository does not
     * support versioning (and therefore all nodes are always "checked-out",
     * by default).
     *
     * @return boolean
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function isCheckedOut()
    {
        // TODO: Implement isCheckedOut() method.
    }

    /**
     * Determine if the current node has been locked.
     *
     * Returns true if this node is locked either as a result of a lock held
     * by this node or by a deep lock on a node above this node;
     * otherwise returns false. This includes the case where a repository does
     * not support locking (in which case all nodes are "unlocked" by default).
     *
     * @return boolean.
     *
     * @throws RepositoryException if an error occurs.
     *
     * @api
     */
    public function isLocked()
    {
        // TODO: Implement isLocked() method.
    }

    /**
     * Causes the lifecycle state of this node to undergo the specified
     * transition.
     *
     * This method may change the value of the jcr:currentLifecycleState
     * property, in most cases it is expected that the implementation will
     * change the value to that of the passed transition parameter, though this
     * is an implementation-specific issue. If the jcr:currentLifecycleState
     * property is changed the change is persisted immediately, there is no
     * need to call save.
     *
     * @param string $transition a state transition
     *
     * @throws UnsupportedRepositoryOperationException if this
     *      implementation does not support lifecycle actions or if this node
     *      does not have the mix:lifecycle mixin.
     * @throws InvalidLifecycleTransitionException if the lifecycle
     *      transition is not successful.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function followLifecycleTransition($transition)
    {
        // TODO: Implement followLifecycleTransition() method.
    }

    /**
     * Returns the list of valid state transitions for this node.
     *
     * @return array a string array.
     *
     * @throws UnsupportedRepositoryOperationException if this
     *      implementation does not support lifecycle actions or if this node
     *      does not have the mix:lifecycle mixin.
     * @throws RepositoryException if another error occurs.
     *
     * @api
     */
    public function getAllowedLifecycleTransitions()
    {
        // TODO: Implement getAllowedLifecycleTransitions() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }


}