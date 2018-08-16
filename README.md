# Generate Zipcodes based on City name
Simple Smarty Streets zipcode API wrapper that outputs a comma-separated list of zipcodes based on a given city name.

## GET YOUR ZIPCODE API KEY
The Smarty Streets zipcode api allows 250 free lookups per month. Use them wisely.

https://smartystreets.com/products/apis/us-zipcode-api

Get the Free account here (you only need to provide a Name and Email address):

https://smartystreets.com/pricing

Get your API Keys from here:

https://smartystreets.com/account#keys

Keep that **Auth ID** and **Auth Token** handy, you'll need them for next step.

## SETUP

### Set your auth id and auth token
Update the two lines below in `zipcode-api.php` with your personal Smarty Streets API "auth id" and "auth token":
```
$auth-id = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
$uth-token = 'xxxxxxxxxxxxxxxxxxxx';
```

### Set the US State name
Next, change this line to match the two-letter state name of your city list.
`$state = "CA";` 

### Edit the city names
Depending on your needs, you may need to wipe the example cities in `cities.txt` and start from scratch. Just keep in mind to avoid any punctuation characters (eg: `,`). You only need one city per line, with a hard return at the end.

## USAGE
Run it on the command line with:
`php zipcode-api.php`

Or grab a text editor with a built-in PHP compiler, like CodeRunner (MacOS)
https://coderunnerapp.com/

## OUTPUT
Zipcode printout will be comma-separated.
```
************************************************
Culver City
90230, 90231, 90232, 90233,
```

## NOTE
* City names consisting of two or more words require that spaces are changed to `+` signs. You don't have to do this in the input text file, the script will replace the spaces for you.
* If the script throws an error, it will most likely be due to text file formmating. Make sure to use a plain text editor.
