
## About
A timer web application for the online game, Black Desert Online. This project was created to assist players to keep track of items as they are posted on the marketplace.

## Setup
I developed this app using XAMPP as my development environment. After moving the project to XAMPP/htdocs, run:

`> php composer.phar update`

The website can then be viewed via the URL:
http://localhost/<path-to-project-location>/bdo/public/

## Explanation of project
This project was built using Laravel. A core motivation for this project was to experiment with local storage and session to store data, with no login system. Often times, a gamer will be using the same computer to access a website. As such, storing small amounts of data (notes recorded in the scratchpad and settings affecting the view) can be stored in cookies. Additionally, in the case of Black Desert Online, the items that this website is built to keep timers on expire naturally after 20 minutes, at maximum. This timer data is perfect to store in session.

As a result, the data is all stored either locally or in sessions, and requires no login. Having no login enhances the user experience (in this case), and allows the user to access the tools anonymously, without sharing any personal information.
