<?php

// http://www.diplod.it/2008/01/21/installare-apache-php-mysql-su-windows-vista/

class Form extends CI_Controller 
{
    private $_captcha;
    
    public function captcha_check($sent_captcha)
    {
        if ($this->_captcha !== md5(strtolower($sent_captcha)))
        {
            $this->form_validation->set_message('captcha_check', 'The {field} is not valid');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
        
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('session');

        if(!empty($this->session->flashdata('captcha')))
        {
            $this->_captcha = $this->session->flashdata('captcha');
        }

        $this->form_validation->set_rules(
            'prefix', 
            'Prefix',
            'required|is_numeric|exact_length[3]|in_list[330,333,334,335,336,337,338,339,360,361,362,363,366,368,385,340,341,342,343,344,345,346,347,348,349,320,322,323,324,327,328,329,380,383,388,390,391,392,393,397,313,331,370,377,353,350,389,384,371,373,351]',
            array(
                'required'      => 'You have not provided a %s.',
                'exact_length'  => 'The length of %s must be exactly 3.',
                'in_list'       => 'The %s you have inserted is not recognized'
            )
        );
        $this->form_validation->set_rules(
            'number', 
            'Number',
            'required|is_numeric|exact_length[7]',
            array(
                'required'      => 'You have not provided a %s.',
                'exact_length'  => 'The length of %s must be exactly 7.'
            )
        );
        $this->form_validation->set_rules(
            'captcha', 
            'Captcha',
            'required|exact_length[8]|callback_captcha_check'
        );

        $this->load->helper('captcha');
        $vals = array(
            'img_path'      => './captcha/',
            'img_url'       => $this->config->item("base_url").'captcha/',
            'img_width'     => rand(100, 300),
            'img_height'    => rand(30, 100),
            'expiration'    => 1,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789ABCDEFGHJKLMNPQRSTUVXYZ',
            'colors'        => array(
                'background' => array(rand(170,255), rand(170,255), rand(170,255)),
                'border' => array(255, 255, 255),
                'text' => array(rand(0,85), rand(0,85), rand(0,85)),
                'grid' => array(rand(85,170), rand(85,170), rand(85,170))
            )
        );

        $data = array('cap' => create_captcha($vals));

        $this->session->set_flashdata('captcha', md5(strtolower($data['cap']['word'])));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('my_form', $data);
        }
        else
        {
            $this->load->view('form_success');
        }
    }
}

?>

<html>
    <head>
        <title>My Form</title>
        <style>
            img {
                width:100% !important;
                height:100px !important;
                padding:0;
                margin:0;
                object-fit:fill;
            }
            #captcha {
                width:500px;
                height:100px;
            }
        </style>
    </head>
    <body>
        <?php echo form_open('form'); ?>
            <h5>Prefix</h5>
            <?php echo form_error('prefix'); ?>
            <input type="text" name="prefix" value="<?php echo set_value('prefix'); ?>" size="3" />    
            <h5>Number</h5>
            <?php echo form_error('number'); ?>
            <input type="text" name="number" value="<?php echo set_value('number'); ?>" size="7" />
            <div id="captcha"><?php echo isset($cap['image']) ? $cap['image'] : ""; ?></div>
            <h5>Captcha</h5>
            <?php echo form_error('captcha'); ?>
            <input type="text" name="captcha" value="<?php echo set_value('captcha'); ?>" size="8" />
            <div><input type="submit" value="Submit" /></div>
        <?php echo form_close(); ?>
</body>
</html>
