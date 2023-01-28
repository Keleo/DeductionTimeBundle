# Deduction time plugin for Kimai

Allows to configure activities as being a "deduction time".
A deduction time means that the timesheet duration will be negative.

Deduction times can be edited, but the negative duration is not used in the UI and not saved!

It is always the calculated duration of `end - start`, which is then converted to its negative value.

### Configure an activity

When editing any activity, you will see a new checkbox `Deduction time`.
If this is checked, every future timesheet using this activity, will have negative durations.

### When to use this plugin

If you are too lazy to create multiple records per day, but instead want to record entire days (attendance) and use those to create invoices/exports, 
you find yourself with too many hours on the clock.

You could manually subtract breaks from every day OR you use this plugin.

1. Allow overlapping records in System > Configuration
2. Create a global activity "break time" and activate the `Deduction time` checkbox
3. Use that new activity to record your employees break times, e.g. via calendar
4. Safely export or invoice your times: due to the negative duration the break times will be subtracted from the attendance time

## Installation

This plugin is compatible with the following Kimai releases:

| Bundle version | Minimum Kimai version |
|----------------|-----------------------|
| 2.0            | 2.0                 |
| 1.0            | 1.27.0                |

You find the most notable changes between the versions in the file [CHANGELOG.md](CHANGELOG.md).

Download and extract the [compatible release](https://github.com/Keleo/DeductionTimeBundle/releases) in `var/plugins/` (see [plugin docs](https://www.kimai.org/documentation/plugin-management.html)).

The file structure needs to look like this afterwards:

```bash
var/plugins/
├── DeductionTimeBundle
│   ├── DeductionTimeBundle.php
|   └ ... more files and directories follow here ... 
```

And then rebuild the cache: 
```bash
bin/console kimai:reload --env=prod
```
