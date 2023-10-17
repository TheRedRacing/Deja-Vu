# Deja Vu Web App

Deja vu web app is a web interface for viewing data from the plug-in [DejaVu](https://bakkesplugins.com/plugins/view/55)

## Overview
- Display a list of all the player you meet in rocket league
- Display number of win with each player
- Display number of loss with each player
- Display number of win rate with each player
- Can make sort by number of meeting 

## Changelog

### v1.4.0
- Add `Last meet` column
- add sort to `Username`, `Meet Count`, `First Meet` and `Last Meet` column
- I removed the statistical cards because they contained errors. The data didn't allow us to distinguish wins from losses accurately. For example, in Ranked Doubles mode, which is a 2 vs 2 format, if we    took the three players who played with me, a win would mean that one player would have a win as a team-mate, while the other two players would have a win as opponents. So that would have been counted as three wins for me.

### v1.3.0
- Add tooltip on win and loss column
- Add tooltip on no data column

### v1.2.0
- Add Game mode filter
- Add Select to display number of players

### v1.1.0
- Add Home page with form page to upload player_count.json file
- Default sort is First meet order desc (last meet first)
- Default showing all players (no filter)

### v1.0.0
- Initial release!