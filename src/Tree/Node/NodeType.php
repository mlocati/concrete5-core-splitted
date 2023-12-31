<?php
namespace Concrete\Core\Tree\Node;

use Concrete\Core\Cache\Level\RequestCache;
use Concrete\Core\Foundation\ConcreteObject;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Tree\Node\NodeType as TreeNodeType;
use Concrete\Core\Package\PackageList;
use Core;
use Database;

class NodeType extends ConcreteObject
{
    public function getTreeNodeTypeID()
    {
        return $this->treeNodeTypeID;
    }

    public function getTreeNodeTypeHandle()
    {
        return $this->treeNodeTypeHandle;
    }

    public function getPackageID()
    {
        return $this->pkgID;
    }

    public function getPackageHandle()
    {
        return PackageList::getHandle($this->pkgID);
    }

    public static function add($treeNodeTypeHandle, $pkg = false)
    {
        $pkgID = 0;
        $db = Database::connection();
        if (is_object($pkg)) {
            $pkgID = $pkg->getPackageID();
        }

        $r = $db->query("insert into TreeNodeTypes (treeNodeTypeHandle, pkgID) values (?, ?)", array(
            $treeNodeTypeHandle, $pkgID,
        ));

        $treeNodeTypeID = $db->Insert_ID();

        return static::getByID($treeNodeTypeID);
    }

    public function delete()
    {
        $db = Database::connection();
        $db->Execute('delete from TreeNodeTypes where treeNodeTypeID = ?', array($this->treeNodeTypeID));
    }

    public static function getByID($treeNodeTypeID)
    {
        $app = Application::getFacadeApplication();
        /** @var RequestCache $cache */
        $cache = $app->make('cache/request');
        $key = '/Tree/Node/Type/' . $treeNodeTypeID;
        if ($cache->isEnabled()) {
            $item = $cache->getItem($key);
            if ($item->isHit()) {
                return $item->get();
            }
        }

        $type = null;
        $db = Database::connection();
        $row = $db->GetRow('select * from TreeNodeTypes where treeNodeTypeID = ?', array($treeNodeTypeID));
        if (is_array($row) && $row['treeNodeTypeID']) {
            $type = new TreeNodeType();
            $type->setPropertiesFromArray($row);
        }

        if (is_object($type) && isset($item) && $item->isMiss()) {
            $item->set($type);
            $cache->save($item);
        }

        return $type;
    }

    public static function getByHandle($treeNodeTypeHandle)
    {
        $db = Database::connection();
        $row = $db->GetRow('select * from TreeNodeTypes where treeNodeTypeHandle = ?', array($treeNodeTypeHandle));
        if (is_array($row) && isset($row['treeNodeTypeHandle'])) {
            $type = new TreeNodeType();
            $type->setPropertiesFromArray($row);

            return $type;
        }
    }

    public function getTreeNodeTypeClass()
    {
        $txt = Core::make('helper/text');
        $className = '\\Concrete\\Core\\Tree\\Node\\Type\\' . $txt->camelcase($this->treeNodeTypeHandle);

        return $className;
    }

    public static function getListByPackage($pkg)
    {
        $db = Database::connection();
        $list = array();
        $r = $db->Execute('select treeNodeTypeID from TreeNodeTypes where pkgID = ? order by treeNodeTypeID asc', array($pkg->getPackageID()));
        while ($row = $r->fetch()) {
            $list[] = TreeNodeType::getByID($row['treeNodeTypeID']);
        }
        $r->free();

        return $list;
    }

    public static function getList()
    {
        $db = Database::connection();
        $list = array();
        $r = $db->Execute('select treeNodeTypeID from TreeNodeTypes order by treeNodeTypeID asc');
        while ($row = $r->fetch()) {
            $list[] = TreeNodeType::getByID($row['treeNodeTypeID']);
        }

        return $list;
    }

    public function export(\SimpleXMLElement $node)
    {
        $node = $node->addChild('treenodetype');
        $node->addAttribute('handle', $this->getTreeNodeTypeHandle());
        $node->addAttribute('package', $this->getPackageHandle());
        return $node;
    }

}
