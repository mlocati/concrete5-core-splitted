<?php
namespace Concrete\Core\Tree\Type;

use Concrete\Core\Tree\Node\Type\Group as GroupTreeNode;
use Concrete\Core\Tree\Tree;
use Database;

class Group extends Tree
{
    /** Returns the standard name for this tree
     * @return string
     */
    public function getTreeName()
    {
        return 'Groups Tree';
    }

    /** Returns the display name for this tree (localized and escaped accordingly to $format)
     * @param  string $format = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
     *
     * @return string
     */
    public function getTreeDisplayName($format = 'html')
    {
        $value = tc('TreeName', 'Groups Tree');
        switch ($format) {
            case 'html':
                return h($value);
            case 'text':
            default:
                return $value;
        }
    }

    /**
     * Get the Group instance.
     *
     * @return Group|null
     */
    public static function get()
    {
        $db = Database::connection();
        $treeID = $db->fetchOne('SELECT Trees.treeID FROM TreeTypes INNER JOIN Trees ON TreeTypes.treeTypeID = Trees.treeTypeID WHERE TreeTypes.treeTypeHandle = ?', ['group']);

        return Tree::getByID($treeID);
    }

    public function exportDetails(\SimpleXMLElement $sx)
    {
    }

    protected function deleteDetails()
    {
    }

    public static function add()
    {
        // copy permissions from the other node.
        $rootNode = GroupTreeNode::add();
        $treeID = parent::create($rootNode);
        $tree = self::getByID($treeID);

        return $tree;
    }

    protected function loadDetails()
    {
    }

    public static function ensureGroupNodes()
    {
        $db = Database::connection();
        $tree = static::get();
        $rootNode = $tree->getRootTreeNodeObject();
        $rows = $db->fetchFirstColumn('select Groups.gID from ' . $db->getDatabasePlatform()->quoteSingleIdentifier('Groups') . ' left join TreeGroupNodes on Groups.gID = TreeGroupNodes.gID where TreeGroupNodes.gID is null');
        foreach ($rows as $gID) {
            $g = static::getByID($gID);
            GroupTreeNode::add($g, $rootNode);
        }
    }
}
