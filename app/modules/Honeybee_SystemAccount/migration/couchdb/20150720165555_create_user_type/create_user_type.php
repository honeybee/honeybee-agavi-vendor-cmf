<?php

namespace Honeybee\SystemAccount\Migration\CouchDb;

use Honeybee\Infrastructure\Migration\CouchDbMigration;
use Honeybee\Infrastructure\Migration\MigrationTargetInterface;
use Honeybee\Infrastructure\Migration\MigrationInterface;

class Migration_20150720165555_CreateUserType extends CouchDbMigration
{
    protected function up(MigrationTargetInterface $migration_target)
    {
        $this->updateDesignDoc($migration_target);
    }

    protected function down(MigrationTargetInterface $migration_target)
    {
        $this->deleteDesignDoc($migration_target);
    }

    public function getDescription($direction = MigrationInterface::MIGRATE_UP)
    {
        if ($direction === MigrationInterface::MIGRATE_UP) {
            return 'Will add design docs to the couchdb database for the Testing context.';
        }
        return 'Will delete the design docs for the couchdb database Testing context.';
    }

    public function isReversible()
    {
        return true;
    }

    protected function getViewsDirectory()
    {
        return __DIR__;
    }

    protected function getDesignDocName()
    {
        return 'honeybee-system_account-user';
    }
}