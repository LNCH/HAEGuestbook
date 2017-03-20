DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
	`id`			INT(11) AUTO_INCREMENT,
    `author_name` 	VARCHAR(128),
    `date_posted` 	DATETIME,
    `message`		TEXT,
    `status` 		CHAR(1) DEFAULT "A",
    `edited`		DATETIME,
    PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS users;
CREATE TABLE users (
	`id`			INT(11) AUTO_INCREMENT,
	`username`		VARCHAR(64),
	`password_hash`	VARCHAR(255),
	`date_created`	DATETIME,
	`last_login`	DATETIME,
	PRIMARY KEY(`id`)
);

INSERT INTO messages (`author_name`, `date_posted`, `message`) VALUES
('Adam Savage', 				'2016-05-01 15:32:42',
'While working on Mythbusters, we ended up with a lot of useless inventions and creations that had no home. 

Thankfully, with your help we have managed to ship everything to a remote bunker in Siberia to free up space in our workshop!

Thanks for all your help, we hope to work with you again after another few seasons!'),

('Brian Cranston', 				'2014-01-03 15:32:42',
'As a very involved...science teacher...I often have a large amount of produc...I mean, knowledge that needs to be delivered. I don\'t like to be disappointed, and you did nto disappoint. I will certainly reccommend your services to people in the future.'),

('David Beckham', 				'2015-03-07 15:32:42',
'When I\'m not playing football, or donating to charity, I love to research airlines. I always wanted to learn more about planes, and your company has definitely helped me to do that.

Brooklyn and Victoria get fed up of hearing me talk about airport security when we travel to see Manchester United play now!'),

('Engleburt Humpedinck', 		'2014-04-09 15:32:42',
'Well being 80, I\'m not a big fan of these infernal machines, but I wanted to express my thanks for all the help shipping my numerous back editions of my records.

Since no-one seems to be keen on buying vinyl records these days, my garage has become rather congested with them!'),

('Freddie Mercury', 			'2016-05-11 15:32:42',
'Thanks for helping me Break Free from the shackles of poor alternative cargo options!

I have just ended my contract with my last company, who insisted on putting me Under Pressure to renew, so Another One Bites The Dust there, and I\'m sure you\'re all singing We Are The Champions in the office!'),

('Gandalf', 					'2016-06-13 15:32:42',
'You shall not pass!... oh wait, my apologies I must be confused. I thought I was fighting other worldly demons for a moment.

Instead I am remarking on the fine job your company did in training my apprentice wizards in the art of airport security. Gone are the days when we are unfairly persecuted for attempting to bring magical weapons onto aircraft, and now we can travel peacefully, safe in the knowledge that we are adhering to airport guidelines and also able to protect the human race from demon attacks at any moment.'),

('Harry Potter', 				'2017-01-15 15:32:42',
'While I usually travel by broom or apparating, that becomes rather difficult when I want to transport boxes and boxes of the Weasley brothers crazy sweets!

I got in touch with HAE to use one of their muggle planes to transport them instead, and it was actually not far off magic from how quick and easy it was!'),

('Ignacio \'Nacho\' Monreal', 	'2015-08-17 15:32:42',
'Don\'t tell Arsene, but I\'ve been thinking of changing career paths to run an airline. To do this I wanted someone to give me advice on what I\'d need and what to do.

HAE\'s consultants helped me out more than I could imagine, and I don\'t think I\'ll be resigning a new contract next season!'),

('Jack Sparrow', 				'2016-09-19 15:32:42',
'I used to transport my...cargo...via boat, but eventually that became tiresome, and we ran out of rum.

I chose to change to these new fangled plane things, and it has done the world of good. There\'s no splashing either!'),

('Operah Winfrey', 				'2016-01-22 15:32:42',
'I often give away lots of free stuff on my show, even things like cars!

Those items have to get to my audience one way or another, and for me, air travel is the only way. I rely on HAE to make all the arrangements and they\'ve not let me down yet!'),

('Queen Elizabeth II', 			'2014-03-18 15:32:42',
'One heartily endorses this company. One is also a lady of few words.'),

('Ryan Reynolds', 				'2013-04-16 15:32:42',
'My newfound hobby of following Hugh Jackman around requires a LOT of flying, and that means going through LOTS of airports.

Being as I am obviously Deadpool, I always have a LOT of weapons with me. Airport security seem to frown on that, who knew! Well now I do thanks to your online training!

Here I come Hugh!'),

('Steven Hawking', 				'2016-05-14 15:32:42',
'I decided to undertake your online training course, however since I am already incredibly intelligent, I already knew all of the information.

Nevertheless, I enjoyed the experience, and will reccommend it to my slightly less intelligent friends (which is most people!)'),

('Thor (God of Thunder)', 		'2017-03-24 15:32:42',
'This website...I like it! Never since I dined in the great halls of Valhalla have I seen something as divine as this small guestbook website!

I shall remember it fondly as I battle my way across the nine realms!'),

('Will Ferrell', 				'2015-08-08 15:32:42',
'I wanna say something. I\'m gonna put it out there; if you like it, you can take it, if you don\'t, send it right back...airport security is awesome!

I know this because of your excellent training services. Thanks a lot, and you stay classy HAE!'),

('Yves Lavigne', 				'2016-09-04 15:32:42',
'Working with the UFC often involves a lot of travel, especially when we host events in other countries. Often the rings, the screens, the fight arena\'s equipment all needs to be moved from the US to wherever the event is.

We\'re pretty good at handling aggessive fighters, but not so great with airport cargo, so it\'s great to know that you guys are there to help us sort everthing out with that!'),

('Zebra...from the Madagascar film', 	'2016-11-02 15:32:42',
'Aasc afij gea casuihg asc pafhga dafas

Our apologies, somehow the zebra got hold of a computer and tried to leave a message. It didn\'t realise that hooves don\'t work well for typing!');