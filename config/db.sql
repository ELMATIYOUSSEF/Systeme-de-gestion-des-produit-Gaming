CREATE TABLE `admin`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
`Name` varchar(255) DEFAULT NULL,
    `UserName` varchar(255) DEFAULT NULL,
    `Email` varchar(255) UNIQUE,
    `PassWord` varchar(255) DEFAULT NULL
);

CREATE TABLE `categorie`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `Label` varchar(255)
);

CREATE TABLE `product`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `Image` varchar(256),
    `Id_cate` int(11) NOT Null ,
    `Titel` varchar(255) DEFAULT NULL,
    `Description` varchar(255) DEFAULT NULL,
    `Price` int(11),
    `Quntite` int(11),
    `Id_admin` int(11) NOT NULL,
    CONSTRAINT Fk_CategorieProduct FOREIGN KEY (Id_cate) REFERENCES categorie(id) ON UPDATE CASCADE ON DELETE CASCADE , 
    CONSTRAINT Fk_adminProduct FOREIGN KEY (Id_admin) REFERENCES admin(id) ON UPDATE CASCADE ON DELETE CASCADE 
);
