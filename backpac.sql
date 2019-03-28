/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.7.25 : Database - backpac
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`backpac` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `backpac`;

/*Table structure for table `TB_MEMBER` */

DROP TABLE IF EXISTS `TB_MEMBER`;

CREATE TABLE `TB_MEMBER` (
  `member_idx` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'index',
  `member_email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `member_password` varchar(50) DEFAULT NULL COMMENT '비밀번호',
  `member_name` varchar(50) DEFAULT NULL COMMENT '이름',
  `member_phone` varchar(50) DEFAULT NULL COMMENT '휴대폰번호',
  `member_recom_code` varchar(50) DEFAULT NULL COMMENT '추천인코드',
  `member_event_auth` char(1) DEFAULT 'N' COMMENT '쿠폰/이벤트알람동의(Y,N)',
  `member_ins_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '입력일',
  `member_mod_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '수정일',
  PRIMARY KEY (`member_idx`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `TB_MEMBER` */

insert  into `TB_MEMBER`(`member_idx`,`member_email`,`member_password`,`member_name`,`member_phone`,`member_recom_code`,`member_event_auth`,`member_ins_date`,`member_mod_date`) values 
(1,'abc1@abc.com','pwd1','회원명1','010-1111-111',NULL,'Y','2019-03-28 17:28:59','2019-03-28 17:28:59'),
(2,'abc2@abc.com','pwd2','회원명2','010-2222-2222',NULL,'N','2019-03-28 17:29:20','2019-03-28 17:29:20'),
(3,'abc3@abc.com','pwd3','회원명3','010-3333-3333',NULL,'N','2019-03-28 17:29:52','2019-03-28 17:29:52'),
(4,'abc4@abc.com','pwd4','회원명4','010-4444-4444',NULL,'Y','2019-03-28 17:30:20','2019-03-28 17:30:20'),
(5,'abc5@abc.com','pwd5','회원명5','010-5555-5555',NULL,'Y','2019-03-28 17:30:42','2019-03-28 17:30:42'),
(6,'abc6@abc.com','pwd6','회원명6','010-6666-6666',NULL,'Y','2019-03-28 17:31:02','2019-03-28 17:31:02'),
(7,'abc7@abc.com','pwd7','회원명7','010-7777-7777',NULL,'Y','2019-03-28 17:31:20','2019-03-28 17:31:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
