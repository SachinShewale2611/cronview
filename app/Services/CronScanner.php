<?php

namespace App\Services;

use Cron\CronExpression;
use Illuminate\Console\Scheduling\Schedule;
use Lorisleiva\CronTranslator\CronTranslator;

class CronScanner
{

    public static function getScheduledTasks(): array
    {
        require base_path('routes/console.php');
        $schedule = app(Schedule::class);
        $events = collect($schedule->events());

        return $events->map(function ($event) {
            $cron = new CronExpression($event->expression);

            return [
                'command' => $event->command,
                'expression' => $event->expression,
                'readable' => CronTranslator::translate($event->expression),
                'next_run' => $cron->getNextRunDate()->format('Y-m-d H:i:s'),
                'previous_run' => $cron->getPreviousRunDate()->format('Y-m-d H:i:s'),
                'description' => $event->description ?? '—',
            ];
        })->values()->toArray();
    }
}
