
## About
A timer web application for the online game, Black Desert Online. This project was created to assist players to keep track of items as they are posted on the marketplace.

This website is currently hosted at:
http://www.ohaiotaku.com/

## Setup
I developed this app using XAMPP as my development environment. After moving the project to XAMPP/htdocs, run:

`> php composer.phar update`

The website can then be viewed via the URL:
http://localhost/{{path-to-project-location}}/bdo/public/

## Explanation of project
This project was built using Laravel. A core motivation for this project was to experiment with local storage and session to store data, with no login system. Often times, a gamer will be using the same computer to access a website. As such, storing small amounts of data (notes recorded in the scratchpad and settings affecting the view) can be stored in cookies, instead of persisting in a database. Additionally, in the case of Black Desert Online, the items that this website is built to keep timers on expire naturally after 20 minutes, at maximum. This timer data is perfect to store in session.

As a result, the data is all stored either locally or in sessions, and requires no login. Having no login enhances the user experience (in this case), and allows the user to access the tools anonymously, without sharing any personal information.

User experience was kept in mind during the development of this app, and I tried to ensure all processes were streamlined for the user. This can be seen in the process to begin a timer on the home page (with shortcuts to submit the form, autofilling entries, etc), and in the autosave feature on the Scratch page.

The website's functionality was built using vanilla JavaScript.

## Website usage
### Home page (timer)
In the form, enter the item name 'Dandelion Kerispear'. Then simply click on the tick (or press `ctrl+enter`) to start the timer. After the timer has started, relevant fields can be changed.
Please note that the times displayed under the system time correspond to the in-game time of Black Desert online.

### Failstacks page
This page is simply a static view page to display information that users commonly need to reference.

### Links page
This is another static view page, containing links that are commonly accessed by users.

### Scratch page
The Scratch page is used to keep notes. This may seem odd to have on a timer website, but I often found myself needing to write notes to myself whilst playing Black Desert Online, to keep track of various things. To use the scratch page, simply enter some text into the form and submit it. Notes can then be updated by simply clicking on them and typing changes. After 3 seconds of inactivity after making changes to a note, the note is saved via an AJAX call.
