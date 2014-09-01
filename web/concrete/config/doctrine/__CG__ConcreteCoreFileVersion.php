<?php

namespace DoctrineProxies\__CG__\Concrete\Core\File;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Version extends \Concrete\Core\File\Version implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'file', 'fvID', 'fvFilename', 'fvPrefix', 'fvDateAdded', 'fvActivateDateTime', 'fvIsApproved', 'fvAuthorUID', 'fvSize', 'fvApproverUID', 'fvTitle', 'fvExtension', 'fvType', 'fvTags', 'fvHasListingThumbnail', 'fvHasDetailThumbnail', 'attributes');
        }

        return array('__isInitialized__', 'file', 'fvID', 'fvFilename', 'fvPrefix', 'fvDateAdded', 'fvActivateDateTime', 'fvIsApproved', 'fvAuthorUID', 'fvSize', 'fvApproverUID', 'fvTitle', 'fvExtension', 'fvType', 'fvTags', 'fvHasListingThumbnail', 'fvHasDetailThumbnail', 'attributes');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Version $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setFile(\Concrete\Core\File\File $file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFile', array($file));

        return parent::setFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function getFileID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileID', array());

        return parent::getFileID();
    }

    /**
     * {@inheritDoc}
     */
    public function getFileVersionID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileVersionID', array());

        return parent::getFileVersionID();
    }

    /**
     * {@inheritDoc}
     */
    public function getPrefix()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrefix', array());

        return parent::getPrefix();
    }

    /**
     * {@inheritDoc}
     */
    public function getFileName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileName', array());

        return parent::getFileName();
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function getTags()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTags', array());

        return parent::getTags();
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function isApproved()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isApproved', array());

        return parent::isApproved();
    }

    /**
     * {@inheritDoc}
     */
    public function getGenericTypeText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGenericTypeText', array());

        return parent::getGenericTypeText();
    }

    /**
     * {@inheritDoc}
     */
    public function getFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFile', array());

        return parent::getFile();
    }

    /**
     * {@inheritDoc}
     */
    public function getTagsList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTagsList', array());

        return parent::getTagsList();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute($ak, $value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAttribute', array($ak, $value));

        return parent::setAttribute($ak, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function clearAttribute($ak)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'clearAttribute', array($ak));

        return parent::clearAttribute($ak);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributeValueObject($ak, $createIfNotFound = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttributeValueObject', array($ak, $createIfNotFound));

        return parent::getAttributeValueObject($ak, $createIfNotFound);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute($ak, $mode = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttribute', array($ak, $mode));

        return parent::getAttribute($ak, $mode);
    }

    /**
     * {@inheritDoc}
     */
    public function getMimeType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMimeType', array());

        return parent::getMimeType();
    }

    /**
     * {@inheritDoc}
     */
    public function getSize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSize', array());

        return parent::getSize();
    }

    /**
     * {@inheritDoc}
     */
    public function getFullSize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFullSize', array());

        return parent::getFullSize();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorName', array());

        return parent::getAuthorName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorUserID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorUserID', array());

        return parent::getAuthorUserID();
    }

    /**
     * {@inheritDoc}
     */
    public function getDateAdded()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateAdded', array());

        return parent::getDateAdded();
    }

    /**
     * {@inheritDoc}
     */
    public function getExtension()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExtension', array());

        return parent::getExtension();
    }

    /**
     * {@inheritDoc}
     */
    public function logVersionUpdate($updateTypeID, $updateTypeAttributeID = 0)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'logVersionUpdate', array($updateTypeID, $updateTypeAttributeID));

        return parent::logVersionUpdate($updateTypeID, $updateTypeAttributeID);
    }

    /**
     * {@inheritDoc}
     */
    public function duplicate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'duplicate', array());

        return parent::duplicate();
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', array());

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeObject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeObject', array());

        return parent::getTypeObject();
    }

    /**
     * {@inheritDoc}
     */
    public function getVersionLogComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVersionLogComments', array());

        return parent::getVersionLogComments();
    }

    /**
     * {@inheritDoc}
     */
    public function updateTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateTitle', array($title));

        return parent::updateTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function updateTags($tags)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateTags', array($tags));

        return parent::updateTags($tags);
    }

    /**
     * {@inheritDoc}
     */
    public function updateDescription($descr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateDescription', array($descr));

        return parent::updateDescription($descr);
    }

    /**
     * {@inheritDoc}
     */
    public function updateFile($filename, $prefix)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateFile', array($filename, $prefix));

        return parent::updateFile($filename, $prefix);
    }

    /**
     * {@inheritDoc}
     */
    public function approve()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'approve', array());

        return parent::approve();
    }

    /**
     * {@inheritDoc}
     */
    public function deny()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'deny', array());

        return parent::deny();
    }

    /**
     * {@inheritDoc}
     */
    public function delete()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'delete', array());

        return parent::delete();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteThumbnail($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'deleteThumbnail', array($type));

        return parent::deleteThumbnail($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getFileResource()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileResource', array());

        return parent::getFileResource();
    }

    /**
     * {@inheritDoc}
     */
    public function getURL()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getURL', array());

        return parent::getURL();
    }

    /**
     * {@inheritDoc}
     */
    public function getFileContents()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileContents', array());

        return parent::getFileContents();
    }

    /**
     * {@inheritDoc}
     */
    public function getDownloadURL()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDownloadURL', array());

        return parent::getDownloadURL();
    }

    /**
     * {@inheritDoc}
     */
    public function getForceDownloadURL()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getForceDownloadURL', array());

        return parent::getForceDownloadURL();
    }

    /**
     * {@inheritDoc}
     */
    public function forceDownload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'forceDownload', array());

        return parent::forceDownload();
    }

    /**
     * {@inheritDoc}
     */
    public function getRelativePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRelativePath', array());

        return parent::getRelativePath();
    }

    /**
     * {@inheritDoc}
     */
    public function getThumbnailURL($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getThumbnailURL', array($type));

        return parent::getThumbnailURL($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getThumbnails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getThumbnails', array());

        return parent::getThumbnails();
    }

    /**
     * {@inheritDoc}
     */
    public function rescanThumbnails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'rescanThumbnails', array());

        return parent::rescanThumbnails();
    }

    /**
     * {@inheritDoc}
     */
    public function hasThumbnail($level)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasThumbnail', array($level));

        return parent::hasThumbnail($level);
    }

    /**
     * {@inheritDoc}
     */
    public function getListingThumbnailImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getListingThumbnailImage', array());

        return parent::getListingThumbnailImage();
    }

    /**
     * {@inheritDoc}
     */
    public function getDetailThumbnailImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDetailThumbnailImage', array());

        return parent::getDetailThumbnailImage();
    }

    /**
     * {@inheritDoc}
     */
    public function refreshAttributes($firstRun = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'refreshAttributes', array($firstRun));

        return parent::refreshAttributes($firstRun);
    }

    /**
     * {@inheritDoc}
     */
    public function canView()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'canView', array());

        return parent::canView();
    }

    /**
     * {@inheritDoc}
     */
    public function canEdit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'canEdit', array());

        return parent::canEdit();
    }

    /**
     * {@inheritDoc}
     */
    public function getJSONObject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJSONObject', array());

        return parent::getJSONObject();
    }

}
