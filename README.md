# Deduction time plugin for Kimai

Allows to configure activities as being a "deduction time".
A deduction time means that the timesheet duration will be negative.

Deduction times can be edited, but the negative duration is not used in the UI and not saved!

It is always the calculated duration of `end - start`, which is then converted to its negative value.

## Installation

First clone it to your Kimai installation `plugins` directory:
```bash
cd var/plugins/
git clone https://github.com/Keleo/DeductionTimeBundle.git
```

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
