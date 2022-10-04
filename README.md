# Deduction time plugin for Kimai


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
