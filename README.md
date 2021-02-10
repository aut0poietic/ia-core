# IA Core Functionality
An artful plugin that modifies some core functionality of WordPress, Irresponsibly!

## Requirements

- PHP 7.2+
- WordPress 5.6+

_**Note**: Other versions of PHP & WordPress may work, but were not tested. YMMV_ :shrug:

## Install

- Clone or download and extract into wp-content/plugins directory for your site.
- Activate the plugin via the WordPress Admin -> Plugins page.
- Get to building your site, slacker.

## Included Functionality

### Remove Random Comment CSS
Removes injected style from comment widgets. Because, why?

### Ensure Scripts all use 'defer'
All script tags on the front-end will be given the `defer` attribute.

_*Note:* Make sure your scripts (and plugins) don't depend on load order. This plugin does not allow for exceptions._

### Ensure Styles all use 'defer'
All style link tags on the front-end will be given the `defer` attribute.

### Remove Emojis
Emoji script, styles, images removed. 

### Disable Author Pages
Because no one reads these. Technique found in the (10up Experience Plugin)[https://github.com/10up/10up-experience]. Used Irresponsibly.

### Extra Headers!
Everyone needs Headers. Now you have more. Adds `X-Frame-Options=sameorigin` to help with Click-jacking and `X-UA-Compatible=IE=edge` to make sure IE 11 uses its latest rendering engine for what it thinks are 'intranet' sites. 

Click-jacking technique found in the (10up Experience Plugin)[https://github.com/10up/10up-experience]. Used Irresponsibly.

### Gravity Forms Domain in Admin Notifications
I don't always use Gravity Forms, but when I do, I need to know what site it came from.

Technique found in the (EA-Core-Functionality Plugin by Bill Erickson)[https://github.com/billerickson/EA-Core-Functionality]. Used Irresponsibly.

### Default Image Link: None
I forget to check the "link type" on images. Always.

Technique found in the (EA-Core-Functionality Plugin by Bill Erickson)[https://github.com/billerickson/EA-Core-Functionality]. Used Irresponsibly.

### Remove Custom Fields Metabox
Ya have to add this when you want meta to show up in REST. But who says you have to actually display it.

Technique found in the (EA-Core-Functionality Plugin by Bill Erickson)[https://github.com/billerickson/EA-Core-Functionality]. Used Irresponsibly.


### Disable Trackbacks
The idea of random sites adding content to a post gives me the willies. This removes that.

Technique originally created by Christopher Davis.
Technique found in the (EA-Core-Functionality Plugin by Bill Erickson)[https://github.com/billerickson/EA-Core-Functionality]. Used Irresponsibly.


## Delete-key Friendly!

> "But Jer," you say, "you irresponsible hack! I don't want your so-called feature! Remove it! Now! WAAAAAAAAAH!!"

To which I reply:

> "You, you wonderful bag of whine, are in luck! This plugin features cutting-edge technology that will allow you, 
> even during your publicly recorded hissy-cow, to solve this problem with the click of a single key!"
> 
> "Highlight the feature in your editor of choice and press `delete`!"

