<?php

namespace Concrete\Core\Logging\Entry\Group;

/**
 * Log entry for users being added to groups
 */
class EnterGroup extends UserGroup
{

    public function getEntryMessage()
    {
        return t('User %1$s (ID %2$s) was added to group %3$s (ID %4$s) by an automated process.',
            $this->user->getUserName(),
            $this->user->getUserID(),
            $this->group->getGroupPath(),
            $this->group->getGroupID()
        );
    }

    public function getEntryMessageWithApplier()
    {
        return t('User %1$s (ID %2$s) was added to group %3$s (ID %4$s) by %5$s (ID %6$s).',
            $this->user->getUserName(),
            $this->user->getUserID(),
            $this->group->getGroupPath(),
            $this->group->getGroupID(),
            $this->applier->getUserName(),
            $this->applier->getUserID()
        );
    }

    public function getEntryOperation()
    {
        return 'enter_group';
    }
}
