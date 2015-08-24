<?php

namespace HoneybeeExtensions\Composer;

use Composer\Script\Event;

class MigrationHandler
{
    public static function createMigration(Event $event)
    {
        $io = $event->getIO();
        $process = ScriptToolkit::createProcess(
            'bin/cli honeybee.core.migrate.create',
            ScriptToolkit::getProjectPath($event)
        );

        $process->run(function ($type, $buffer) use($io) {
            $io->write($buffer, false);
        });
    }

    public static function listMigrations(Event $event)
    {
        $io = $event->getIO();
        $process = ScriptToolkit::createProcess(
            'bin/cli honeybee.core.migrate.list',
            ScriptToolkit::getProjectPath($event)
        );

        $process->run(function ($type, $buffer) use($io) {
            $io->write($buffer, false);
        });
    }

    public static function runAllMigrations(Event $event)
    {
        $io = $event->getIO();
        $process = ScriptToolkit::createProcess(
            './bin/cli honeybee.core.migrate.run -target all',
            ScriptToolkit::getProjectPath($event)
        );

        $process->run(function ($type, $buffer) use($io) {
            $io->write($buffer, false);
        });
    }

    public static function runMigration(Event $event)
    {
        $io = $event->getIO();
        $process = ScriptToolkit::createProcess(
            './bin/cli honeybee.core.migrate.run',
            ScriptToolkit::getProjectPath($event)
        );

        $process->run(function ($type, $buffer) use($io) {
            $io->write($buffer, false);
        });
    }
}