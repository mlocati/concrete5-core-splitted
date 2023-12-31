<?php
namespace Concrete\Core\Notification\View;


use Concrete\Core\Entity\Notification\NewFormSubmissionNotification;
use Concrete\Core\Entity\Notification\UserSignupNotification;
use HtmlObject\Element;

class NewFormSubmissionListView extends StandardListView
{

    /**
     * @var NewFormSubmissionNotification
     */
    protected $notification;

    public function getTitle()
    {
        return t('New Form Submission');
    }

    public function getIconClass()
    {
        return 'fas fa-edit';
    }

    public function getActionDescription()
    {
        $entry = $this->notification->getEntry();
        if ($entry) {
            $entity = $entry->getEntity();
            if ($entity) {
                return t('New entry submitted to form: <a href="%s"><strong>%s</strong></a>.',
                    \URL::to('/dashboard/reports/forms', 'view_entry', $entry->getID()), $entity->getEntityDisplayName());
            }
        }
    }


}
