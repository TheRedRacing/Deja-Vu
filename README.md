# Deja Vu Web App

Deja vu web app is a web interface for viewing data from the plug-in [Repository of DejaVu](https://github.com/adamk33n3r/Deja-Vu) for the game [Rocket League](https://www.rocketleague.com/).

## Overview
- Display a list of all the player you meet in rocket league
- Display number of win with each player
- Display number of loss with each player
- Display number of win rate with each player
- Can make sort data by column ascending or descending

## Changelog

### V1.5.0
- Add Toogle button to display players with no data (default show)
- Fix bug with sort `Meet Count` column when you select one game mode, the sort is not correct 

### v1.4.1
- publish on web site : [rocketleague.theredracing.ch](http://rocketleague.theredracing.ch/)
- add username search bar

### v1.4.0
- Add `Last meet` column
- add sort to `Username`, `Meet Count`, `First Meet` and `Last Meet` column
- I removed the statistical cards because they contained errors. The data didn't allow us to distinguish wins from losses accurately. For example, in Ranked Doubles mode, which is a 2 vs 2 format, if we    took the three players who played with me, a win would mean that one player would have a win as a team-mate, while the other two players would have a win as opponents. So that would have been counted as three wins for me.

### v1.3.0
- Add tooltip on win and loss column
- Add tooltip on no data column

### v1.2.0
- Add Game mode filter ( All game mode added )
- Add Select to display number of players ( Default 25 players )

### v1.1.0
- Add Home page with form page to upload player_count.json file
- Default sort is First meet order desc (last meet first)
- Default showing all players (no filter)

### v1.0.0
- Initial release!
