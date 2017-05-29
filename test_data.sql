use tecwebdb;

INSERT INTO category(catId,name,parId)
VALUES('120','car','1');

INSERT INTO category(catId,name,parId)
VALUES('340','food','1');


INSERT INTO company(name,email,website,phone,address,category,description)
VALUES('BMW','bmw@gmail.com','www.bmw.it','10000222','','car','aaaaaa');

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'car','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'car','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'car','OLOLOLOLOLOLO',12.0);

INSERT INTO promotion(company,datebegin,datefine,category,description,price) 
VALUES('BMW',"2008-11-11","2008-12-11",'car','OLOLOLOLOLOLO',12.0);
