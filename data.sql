use tecwebdb;

INSERT INTO category(catId,name) VALUES(100,"Auto");
INSERT INTO category(catId,name) VALUES(200,"Informatica");
INSERT INTO category(catId,name) VALUES(300,"Elettronica");
INSERT INTO category(catId,name) VALUES(400,"Abbigliamento");
INSERT INTO category(catId,name) VALUES(500,"Alimentari");

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('BMW','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Audi','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Fiat','bmw@gmail.com','www.bmw.it','10000222','','Auto','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Microsoft','bmw@gmail.com','www.bmw.it','10000222','','Informatica','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Google','bmw@gmail.com','www.bmw.it','10000222','','Informatica','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Samsung','bmw@gmail.com','www.bmw.it','10000222','','Elettronica','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('LG','bmw@gmail.com','www.bmw.it','10000222','','Elettronica','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('D&G','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Armani Jeans','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Nike','bmw@gmail.com','www.bmw.it','10000222','','Abbigliamento','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Supermercato Si','bmw@gmail.com','www.bmw.it','10000222','','Alimentari','aaaaaa');

INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('Coop','bmw@gmail.com','www.bmw.it','10000222','','Alimentari','aaaaaa');
;-------------------------------------------------------------------------------





;-------------------------------------------------------------------------------
INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Supermercato Si',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/SI/img1.png');
INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Supermercato Si',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/SI/img2.png');
INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Supermercato Si',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/SI/img3.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Coop',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/Coop/img4.png');
INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Coop',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/Coop/img5.png');
INSERT INTO promotion(company,datebegin,datefine,category,description,price,img)
VALUES('Coop',"2008-10-10","2010-12-10",'Alimentari','lololololl',0.0,'Promotions/Alimentari/Coop/img6.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Bmw/img1.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Bmw/img2.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Bmw/img3.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('Audi',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Audi/img1.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('Audi',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Audi/img2.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price,img) 
VALUES('Audi',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0,'Promotions/Auto/Audi/img3.jpg');

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'Auto','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('Audi',"2008-11-11","2008-12-11",'Auto','KAKAKAKAAK',15.0);