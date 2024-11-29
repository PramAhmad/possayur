<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\LaravelSettings\Models\SettingsProperty;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GeneralSetting extends SettingsProperty  implements HasMedia
{
    use InteractsWithMedia;
    use LogsActivity;

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = auth()->user();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logUnguarded()
            ->logOnlyDirty()
            ->useLogName('GeneralSetting');
    }
}
