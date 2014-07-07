# README - P2 - Jared Faucher

## Live URL:

http://p2-jaredf.rhcloud.com/

## Description:

My project is an xkcd style password generator which have a few interesting features.  Using HTML, CSS and PHP I created a password generator where you can choose the number of words in the password, the separator (or camel case), whether to uppcase the first letter and whether to add a number or symbol to the end of the password.

## Details:

Originally I used a word list I found online at the link below to generate my password.  Eventually I created scrape.php to scrape and generate a word list from the website provided in the Word Scraper Hint document.  I still included the code for my original dictionary but have commented it out in logic.php.

Due to the addition of the word scraper that has to make several http requests to scrape all 15 pages from www.paulnoll.com, please allow 10-30 seconds for the page to load!  Page works instantaneously when not scraping another website for words.

## Plugics/Libraries/Etc:

	- Bootstrap: http://getbootstrap.com/
	- Original Word List: http://www-01.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt
	- Scraped Word List: http://www.paulnoll.com/Books/Clear-English/

The only outside sources I used directly for this project was Bootstrap v3.1.1 and a word list I found on Google.  I also used Google and Stack Overflow to find out how to do certain things (e.g. testing that the input to "Number of Words" was an integer") but I did not copy any code directly, just adapted it for my purposes.