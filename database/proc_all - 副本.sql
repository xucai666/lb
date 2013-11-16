DELIMITER $$
DROP PROCEDURE IF EXISTS `corcms_zh_proc_all`$$ CREATE DEFINER=`root`@`localhost`   PROCEDURE `corcms_zh_proc_all`(query_key VARCHAR(50),inp_mid VARCHAR(20),lmt_from INT,page_size INT)
BEGIN
DECLARE var_str VARCHAR(50);
DECLARE mstr VARCHAR(150);
SET var_str = CONCAT('%',query_key,'%');



 IF lmt_from = '' THEN SET lmt_from = '0'; END IF;



 



   IF page_size = '' THEN SET page_size = '15'; END IF;



   



SET @t=0;



CREATE TEMPORARY TABLE IF NOT EXISTS `corcms_zh_sp_output_all_tmp` ENGINE = MEMORY (SELECT * FROM 



(SELECT (@t:=@t+1) AS uid,n_id AS id,n_title AS title,'corcms_zh_module_news' AS  tb, 1 AS m_id FROM corcms_zh_module_news    WHERE n_title  LIKE var_str 



 UNION ALL



 



 SELECT (@t:=@t+1) AS uid,p_id AS id,p_name AS title,'corcms_zh_module_product' AS tb,2 AS m_id  FROM corcms_zh_module_product   WHERE p_name LIKE var_str) AS  tt WHERE FIND_IN_SET(m_id,inp_mid) )  ;



  



SET @SQL = CONCAT("select  a.*,",@t," as rt  from corcms_zh_sp_output_all_tmp  as a   order by id desc limit   ",lmt_from,',',page_size);



   



       PREPARE stmt FROM @SQL;  



     EXECUTE stmt;  



     



  



      DROP  PREPARE stmt;  



   



     



    END$$

DELIMITER ;


DELIMITER $$


DROP PROCEDURE IF EXISTS `corcms_en_proc_all`$$
CREATE  PROCEDURE `corcms_en_proc_all`(query_key VARCHAR(50),inp_mid VARCHAR(20),lmt_from INT,page_size INT)
BEGIN



DECLARE var_str VARCHAR(50);



DECLARE mstr VARCHAR(150);



SET var_str = CONCAT('%',query_key,'%');



 IF lmt_from = '' THEN SET lmt_from = '0'; END IF;



 



   IF page_size = '' THEN SET page_size = '15'; END IF;



   



SET @t=0;



CREATE TEMPORARY TABLE IF NOT EXISTS `corcms_en_sp_output_all_tmp` ENGINE = MEMORY (SELECT * FROM 



(SELECT (@t:=@t+1) AS uid,n_id AS id,n_title AS title,'corcms_en_module_news' AS  tb, 1 AS m_id FROM corcms_en_module_news    WHERE n_title  LIKE var_str 



 UNION ALL



 



 SELECT (@t:=@t+1) AS uid,p_id AS id,p_name AS title,'corcms_en_module_product' AS tb,2 AS m_id  FROM corcms_en_module_product   WHERE p_name LIKE var_str) AS  tt WHERE FIND_IN_SET(m_id,inp_mid) )  ;



  



SET @SQL = CONCAT("select  a.*,",@t," as rt  from corcms_en_sp_output_all_tmp  as a   order by id desc limit   ",lmt_from,',',page_size);



   



       PREPARE stmt FROM @SQL;  



     EXECUTE stmt;  



     



  



      DROP  PREPARE stmt;  



   



     



    END$$

DELIMITER ;
