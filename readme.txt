=== Liturgical Year Themes ===
Contributors: Scott Lenger
Tags: liturgy, calendar, CSS, theme, template
Requires at least: 1.2.1
Tested up to: 2.6
Stable tag: 1

This plugin adds a stylesheet for the day or season of the Liturgical year.

== Description ==
Churches that follow the liturgy change their sanctuary aesthetics according to the liturgical date or season. This plugin uses CSS to allow these same changes to be made to a website's theme. The Liturgical Year Themes Wordpress plugin uses the date() and easter_days() php functions to calculate the current liturgical day or season. A correlating CSS file is loaded which allows the designer to override their default theme with one fitting for the current time on the Christian calendar. The plugin also provides the option of printing the day or season's title in the document markup. The Liturgical Year Themes plugin is targeted at church websites, but can also be useful for journals and blogs that value the liturgy.

Currently includes:
advent.css
third-week-of-advent.css
christmas-eve.css
christmas.css
epiphany.css
after-epiphany.css
transfiguration.css
ash-wednesday.css
lent.css
palm-sunday.css
maundy-thursday.css
good-friday.css
holy-saturday.css
resurrection-sunday.css
easter.css
eastertide.css
ascension.css
pentecost.css
trinity-sunday.css
ordinary-time.css
all-saints-day.css
christ-the-king.css


== Installation ==
1. Upload the /liturgical-year-themes/ folder to your blog's plugins folder (usually /wp-content/plugins/) and activate it.
2. Upload the /liturgy/ folder into your current theme directory (usually /wp-content/themes/your-themes-name/).
3. Add `<?php get_liturgical_time(); ?>` to your header template file after the style.css reference and before the closing </head> tag.
4. Edit the stylesheets in the /liturgy/ directory to override your theme’s default styles.


Optional:
* Use `<?php get_liturgical_time('title'); ?>` in your template files to print the current name or season.
* Use `<?php get_liturgical_time('name'); ?>` in your template files to print the file name for your own use, example:
<img src="/images/`<?php get_liturgical_time('name'); ?>`.jpg" alt="" />
