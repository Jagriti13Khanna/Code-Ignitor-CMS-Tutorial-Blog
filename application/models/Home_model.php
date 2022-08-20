<!-- models/Crud_model.php  -->
<?php 
class Home_model extends CI_Model 
{ 
    function __construct() 
    { 
        // Call the Model constructor 
        parent::__construct(); 
    } 

    function get_articles()
    { 
        $this->db->select('*');
        $this->db->from('ci_articles');
        $this->db->join('users','ci_articles.author_id = users.id' );
        $query = $this->db->get(); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return FALSE; 
        } 
    }

    function get_article_detail($id)
    { 
        $this->db->where('article_id', $id); 
        $query = $this->db->get('ci_articles'); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function insert_article($data)
    { 
        $this->db->insert('ci_articles', $data); 
    }

    function edit_article($data,$id)
    { 

        $this->db->where('article_id', $id); 
        $this->db->update('ci_articles', $data); 
    }

    function delete_article($data,$id)
    { 
        $this->db->where('article_id', $id); 
        $this->db->delete('ci_articles'); 
    }

    function check_owner($article_id,$user_id){
        $query = $this->db->get_where('ci_articles',array('article_id'=>$article_id));

        $article = $query->row();
        //var_dump($article);
        if($article->author_id == $user_id){
            return true;
        }
        return false;
    }
}