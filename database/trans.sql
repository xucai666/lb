TRUNCATE mysys_lang;
#--mysys_module_channel

INSERT INTO  mysys_lang (lang_key,lang_val,lang_type) SELECT c_id,c_title,'en' AS  lang_type FROM mysys_module_channel;

UPDATE  mysys_module_channel  AS  a INNER JOIN   mysys_lang AS b ON a.c_id=b.lang_key  SET a.c_title=b.lang_val ;

#--module

TRUNCATE mysys_lang;


INSERT INTO  mysys_lang (lang_key,lang_val,lang_type) SELECT m_id,m_name,'en' AS  lang_type FROM mysys_module;

UPDATE  mysys_module AS  a INNER JOIN   mysys_lang AS b ON a.m_id=b.lang_key  SET a.m_name=b.lang_val ;


#--tree_node

TRUNCATE mysys_lang;


INSERT INTO  mysys_lang (lang_key,lang_val,lang_type) SELECT id,NAME,'en' AS  lang_type FROM mysys_tree_node;

UPDATE  mysys_tree_node AS  a INNER JOIN   mysys_lang AS b ON a.id=b.lang_key  SET a.name=b.lang_val ;


#--templates

TRUNCATE mysys_lang;


INSERT INTO  mysys_lang (lang_key,lang_val,lang_type) SELECT t_id,t_name,'en' AS  lang_type FROM mysys_templates;

UPDATE  mysys_templates AS  a INNER JOIN   mysys_lang AS b ON a.t_id=b.lang_key  SET a.t_name=b.lang_val ;


#--module_fields

TRUNCATE mysys_lang;


INSERT INTO  mysys_lang (lang_key,lang_val,lang_type) SELECT f_id,f_name,'en' AS  lang_type FROM mysys_module_fields;

UPDATE  mysys_module_fields AS  a INNER JOIN   mysys_lang AS b ON a.f_id=b.lang_key  SET a.f_name=b.lang_val ;







