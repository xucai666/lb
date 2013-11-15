-- MySQL dump 10.13  Distrib 5.1.42, for Win32 (ia32)
--
-- Host: localhost    Database: lb_cn
-- ------------------------------------------------------
-- Server version	5.1.42-community-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'lb_cn'
--
/*!50003 DROP PROCEDURE IF EXISTS `addTreeNode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `addTreeNode`(pid int,code varchar(50),name varchar(50),OUT resultCode int,OUT resultMsg varchar(50))
ExitLabel:BEGIN
    DECLARE vRightId INT; /* 右节点ID */
    DECLARE vLevel INT; /*层级*/
    DECLARE vTreeId INT; /*树ID*/
    DECLARE aff INT; /* SQL 影响记录条数 */
    DECLARE af INT DEFAULT 0; /* 总影响记录条数*/
    
    /* 目标节点的右值、treeId和Level值 */
    SELECT `rightId`,`treeId`,`level`
    INTO vRightId,vTreeId,vLevel
    FROM `mysys_tree_node`
    WHERE `id`= pid;
    
    IF vRightId IS NULL THEN
        SET resultCode = 1002;
        SET resultMsg = "指定的节点不存在";
        LEAVE ExitLabel;
    END IF;
    /*----------开始更新--------------*/
    START TRANSACTION;
    
    /* 更新右侧节点的left值 */
    UPDATE `mysys_tree_node`
    SET `leftId`=`leftId`+2 
    WHERE `treeId` = vTreeId AND `leftId` > vRightId;
    
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    
    /* 更新右侧节点的right值 */
    UPDATE `mysys_tree_node` 
    SET `rightId`=`rightId`+2 
    WHERE `treeId` = vTreeId AND `rightId` >= vRightId;
    
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    
    /* 增加节点自己 */
    INSERT INTO `mysys_tree_node`(`code`,`name`,`pid`,`leftId`,`rightId`,`level`,`treeId`) 
    VALUES (code,name,pid,vRightId,vRightId+1,vLevel+1,vTreeId);
    
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    
    /*至少会插入节点自己，更新根节点，所以最少是2*/
    IF af >= 2 THEN
        COMMIT;
        SET resultCode = 1000;
        SET resultMsg = "成功";
    ELSE
        ROLLBACK;
        SET resultCode = 1001;
        SET resultMsg = "失败";
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addTreeRootNode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `addTreeRootNode`(vTreeId int,code varchar(50),name varchar(50),OUT resultCode int,OUT resultMsg varchar(50))
ExitLabel:BEGIN
    DECLARE vLeftId INT; /* 左节点ID */
    DECLARE aff INT; /* SQL 影响记录条数 */
    
    /* 目标节点的右值、treeId和Level值 */
    SELECT `leftId` INTO vLeftId
    FROM `mysys_tree_node`
    WHERE `treeId`= vTreeId AND `pid` = 0;
    
    IF vLeftId IS NOT NULL THEN
        SET resultCode = 1002;
        SET resultMsg = "根节点已存在";
        LEAVE ExitLabel;
    END IF;
    /*----------开始更新--------------*/
    START TRANSACTION;
    
    /* 增加节点自己,pid=0,leftId=1,rightId=2,level=0 */
    INSERT INTO `mysys_tree_node`(`code`,`name`,`pid`,`leftId`,`rightId`,`level`,`treeId`) 
    VALUES (code,name,0,1,2,0,vTreeId);
    
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    
    IF aff = 1 THEN
        COMMIT;
        SET resultCode = 1000;
        SET resultMsg = "成功";
    ELSE
        ROLLBACK;
        SET resultCode = 1001;
        SET resultMsg = "失败";
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteTreeNode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `deleteTreeNode`(nodeId int,OUT resultCode int,OUT resultMsg varchar(50))
ExitLabel:BEGIN
    DECLARE vLeftId INT; /* 左节点ID */
    DECLARE vRightId INT; /* 右节点ID */
    DECLARE vTreeId INT; /*树ID*/
    DECLARE aff INT; /* SQL 影响记录条数 */
    DECLARE af INT DEFAULT 0; /* 总影响记录条数*/
    /* 查询要删除的节点,变量名不能与字段名一样的哦！！ */
    SELECT `leftId`,`rightId`,`treeId`
    INTO vLeftId,vRightId,vTreeId
    FROM `mysys_tree_node`
    WHERE `id` = nodeId;
    IF vLeftId IS NULL THEN
        SET resultCode = 1002;
        SET resultMsg = "要删除的节点不存在";
        LEAVE ExitLabel;
    END IF;
    
    IF vLeftId=1 THEN
        SET resultCode = 1003;
        SET resultMsg = "根节点不能删除";
        LEAVE ExitLabel;
    END IF;
    /*----------开始更新--------------*/
    START TRANSACTION;
    /* 删除节点及所有子孙节点 */
    DELETE 
    FROM `mysys_tree_node` 
    WHERE `treeId` = vTreeId 
        AND `leftId` between vLeftId AND vRightId;
    
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    
    /* 更新右侧节点的left值 */
    UPDATE `mysys_tree_node`
    SET `leftId`=`leftId`-(vRightId-vLeftId+1)
    WHERE `treeId` = vTreeId AND `leftId`>vLeftId;
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    /* 更新右侧节点的right值 */
    UPDATE `mysys_tree_node` 
    SET `rightId`=`rightId`-(vRightId-vLeftId+1)
    WHERE `treeId` = vTreeId AND `rightId`>vLeftId;
    /* 影响行数 */
    SELECT ROW_COUNT() INTO aff;
    SET af = aff+af;
    
    /* 删除其它关联数据 */
    /*至少会删除自己，更新根节点，所以最少是2*/
    IF af >= 2 THEN
        COMMIT;
        SET resultCode = 1000;
        SET resultMsg = "成功";
    ELSE
        ROLLBACK;
        SET resultCode = 1001;
        SET resultMsg = "失败";
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `editTreeNode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `editTreeNode`(nodeId int,pid int,code varchar(50),name varchar(50),OUT resultCode int,OUT resultMsg varchar(50))
ExitLabel:BEGIN    
    call moveTreeNode(nodeId,pid,resultCode,resultMsg);
    
    IF resultCode=1000 THEN
        /* 节点信息 */
        UPDATE `mysys_tree_node` 
        SET `code` = code,`name` = name
        WHERE `id`= nodeId;
        
        COMMIT;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `moveTreeNode` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `moveTreeNode`(nodeId int,targetId int,OUT resultCode int,OUT resultMsg varchar(50))
ExitLabel:BEGIN
    /* 强烈注意，变量名不要与字段名相同 */
    DECLARE vLeftId INT; /* 左节点ID */
    DECLARE vRightId INT; /* 右节点ID */
    DECLARE vTreeId INT; /*树ID*/
    DECLARE vPid INT; /*节点的父ID*/
    DECLARE vLevel INT; /* 节点的Level */
    DECLARE vTargetLeftId INT; /* 目标节点的左节点ID */
    DECLARE vTargetRightId INT; /* 目标节点的右节点ID */
    DECLARE vTargetLevel INT; /* 目标节点的Level */
    DECLARE vDiff INT; /* 差值*/
    DECLARE vLevelDiff INT; /* Level差值*/
    DECLARE vGroupTreeId INT; /*没啥用*/
    DECLARE vGroupIdStr varchar(1000); /*待移动小树杈的节点列表*/
    
    /* 查询要移动的节点,变量名不能与字段名一样的哦！！ */
    SELECT `leftId`,`rightId`,`treeId`,`pid`,`level`
    INTO vLeftId,vRightId,vTreeId,vPid,vLevel
    FROM `mysys_tree_node`
    WHERE `id`= nodeId;
    /*leftID不为空*/
    IF vLeftId IS NULL THEN
        SET resultCode = 1002;
        SET resultMsg = "要移动的节点不存在";
        LEAVE ExitLabel;
    END IF;
    
    IF vLeftId=1 THEN
        SET resultCode = 1003;
        SET resultMsg = "根节点不能移动";
        LEAVE ExitLabel;
    END IF;
    
    IF nodeId = targetId THEN
        SET resultCode = 1004;
        SET resultMsg = "不能移动到自己";
        LEAVE ExitLabel;
    END IF;
    
    /* 如果目标ID是要移动节点的父节点，不需要移动(同级认为无顺序)*/
    IF vPid = targetId THEN
        SET resultCode = 1000; /*认为是成功操作*/
        SET resultMsg = "目标节点是要移动节点的父节点，不需要移动";
        LEAVE ExitLabel;
    END IF;
    
    /* 查询要移动的节点,变量名不能与字段名一样的哦！！ */
    SELECT `leftId`,`rightId`,`level`
    INTO vTargetLeftId,vTargetRightId,vTargetLevel
    FROM `mysys_tree_node`
    WHERE `treeId` = vTreeId AND `id`= targetId;
    
    IF vTargetLeftId IS NULL THEN
        SET resultCode = 1006;
        SET resultMsg = "目标节点不存在";
        LEAVE ExitLabel;
    END IF;
    
    IF vTargetLeftId > vLeftId AND vTargetLeftId < vRightId THEN
        SET resultCode = 1007;
        SET resultMsg = "目标节点不能是要移动节点的子节点";
        LEAVE ExitLabel;
    END IF;
    
    /*---------------开始更新-------------------------*/
    START TRANSACTION;
    
    /* 保存小树杈的ID值*/
    SELECT `treeId`, group_concat(CAST(`id` as char)) as idStr
        INTO vGroupTreeId,vGroupIdStr
    FROM `mysys_tree_node`
    WHERE `treeId` = vTreeId 
        AND `leftId` between vLeftId AND vRightId
    GROUP BY `treeId`;
        
    /* 目标节点在右边 */
    /* 目标节点是当前节点所在路径上的节点的话，比较特殊，与移动到右侧节点的处理相同 */
    IF vTargetLeftId>vLeftId OR (vTargetLeftId < vLeftId AND vTargetRightId > vRightId) THEN
        /*目标节点的当前right值-1就是移动节点的新right值*/
        SET vDiff = vTargetRightId - 1 - vRightId; /*左右值的差值*/
        SET vLevelDiff = vTargetLevel + 1 - vLevel; /*Level的差值*/
        
        /* 更新小树杈的left、right和level*/
        UPDATE `mysys_tree_node` 
        SET `leftId`=`leftId` +vDiff,
            `rightId`=`rightId` + vDiff,
            `level` = `level` + vLevelDiff
        WHERE `treeId` = vTreeId 
            AND `leftId` between vLeftId AND vRightId;
            
        /* 更新移动节点的父ID */
        UPDATE `mysys_tree_node` 
        SET `pid` = targetId
        WHERE `id`= nodeId; 
        
        /*插入位置左侧的节点的left值和right值要减小*/
        SET vDiff = vRightId-vLeftId+1;
        
        /* left>移动节点原right值 and left<目标节点原right值，并且不是小树杈上的节点*/
        UPDATE `mysys_tree_node` 
        SET `leftId`=`leftId`- vDiff 
        WHERE `treeId` = vTreeId 
            AND `leftId`>vRightId AND `leftId`< vTargetRightId
            AND NOT FIND_IN_SET(CAST(`id` as char),vGroupIdStr);
            
        /* right>移动节点原right值 and right<目标节点原right值，并且不是小树杈上的节点*/
        UPDATE `mysys_tree_node` 
        SET `rightId`=`rightId`- vDiff 
        WHERE `treeId` = vTreeId 
            AND `rightId`>vRightId AND `rightId`< vTargetRightId
            AND NOT FIND_IN_SET(CAST(`id` as char),vGroupIdStr);
    ELSE
        /* 目标节点在左边 */
        
        /*目标节点的当前right值就是移动节点的新left值*/
        SET vDiff = vLeftId - vTargetRightId; /*左右值的差值*/
        SET vLevelDiff = vTargetLevel + 1 - vLevel; /*Level的差值*/
        
        /* 更新小树杈的left、right和level*/
        UPDATE `mysys_tree_node` 
        SET `leftId`=`leftId` -vDiff,
            `rightId`=`rightId` - vDiff,
            `level` = `level` + vLevelDiff
        WHERE `treeId` = vTreeId 
            AND `leftId` between vLeftId AND vRightId;
        
        /* 更新移动节点的父ID */
        UPDATE `mysys_tree_node` 
        SET `pid` = targetId
        WHERE `id`= nodeId; 
        
        /*插入位置右侧的节点的left值和right值要增大*/
        SET vDiff = vRightId-vLeftId+1;
        
        /* left>目标节点原right值 and left<移动节点原right值，并且不是小树杈上的节点*/
        UPDATE `mysys_tree_node` 
        SET `leftId`=`leftId`+ vDiff 
        WHERE `treeId` = vTreeId 
            AND `leftId`>vTargetRightId AND `leftId`< vRightId
            AND NOT FIND_IN_SET(CAST(`id` as char),vGroupIdStr);
            
        /* right>=目标节点原right值 and right<移动节点原right值，并且不是小树杈上的节点*/
        UPDATE `mysys_tree_node` 
        SET `rightId`=`rightId`+ vDiff 
        WHERE `treeId` = vTreeId 
            AND `rightId`>=vTargetRightId AND `rightId`< vRightId
            AND NOT FIND_IN_SET(CAST(`id` as char),vGroupIdStr);
    END IF;
    
    /* 成功，这个费劲啊 */
    COMMIT;
    SET resultCode = 1000;
    SET resultMsg = "成功";
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_all` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `proc_all`(query_key VARCHAR(50),inp_mid VARCHAR(20),lmt_from INT,page_size INT)
BEGIN
DECLARE var_str VARCHAR(50);
DECLARE mstr VARCHAR(150);
SET var_str = CONCAT('%',query_key,'%');
 IF lmt_from = '' THEN SET lmt_from = '0'; END IF;
 
   IF page_size = '' THEN SET page_size = '15'; END IF;
   
SET @t=0;
CREATE TEMPORARY TABLE IF NOT EXISTS `mysys_sp_output_all_tmp` ENGINE = MEMORY (SELECT * FROM 
(SELECT (@t:=@t+1) AS uid,n_id AS id,n_title AS title,'mysys_module_news' AS  tb, 1 AS m_id FROM mysys_module_news    WHERE n_title  LIKE var_str 
 UNION ALL
 
 SELECT (@t:=@t+1) AS uid,p_id AS id,p_name AS title,'mysys_module_product' AS tb,2 AS m_id  FROM mysys_module_product   WHERE p_name LIKE var_str) AS  tt WHERE FIND_IN_SET(m_id,inp_mid) )  ;
  
SET @SQL = CONCAT("select  a.*,",@t," as rt  from mysys_sp_output_all_tmp  as a   order by id desc limit   ",lmt_from,',',page_size);
   
       PREPARE stmt FROM @SQL;  
     EXECUTE stmt;  
     
  
      DROP  PREPARE stmt;  
   
     
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-04 21:00:17

