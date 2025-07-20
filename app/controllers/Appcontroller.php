<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AppController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'my_tag_helper'));
        $this->load->model('encuestaeloquent');
        $this->load->model('usereloquent');
        $this->load->model('careereloquent');
        $this->load->library('pagination');
        $this->form_validation->set_message('no_repetir_email', 'Existe otro registro con el mismo %s');
        /**
         * En caso se defina el campo mobile como único, validaremos si ya se registró anteriormente
         */
        $this->form_validation->set_message('no_repetir_mobile', 'Existe otro registro con el mismo %s');
    }

    public function index()
    {
        //print_r($this->session->userdata);
        //$accessoPermitido = $this->session->has_userdata('isLogged') ? $this->session->userdata('isLogged') : FALSE;
        if ($this->session->userdata('user_role') != NULL) {
            //$data = [];
            //$data['pagina_title'] = 'Bienvenidos';
            $data['content'] = 'app/welcome';
            $this->load->view('app/templateApp', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/');
        }
    }

    /* public function searchBookCards($search = NULL)
    {
        $data = array();
        $config['base_url'] = base_url() . '/users/catalog/';
        $total_row = BookEloquent::getCantEbooks(); //total row
        $data['total_row'] = BookEloquent::getCantEbooks(); //total row
        $config['total_rows'] = $total_row;
        $data['pagina_title'] = $this->uri->segment(2);
        $config['per_page'] = 9;  //show record per halaman

        $config['uri_segment'] = 3;

        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = FALSE;
        $config['enable_query_strings'] = FALSE;

        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
        $config["num_links"] = (fmod(floor($choice), 9) > 9) ? fmod(floor($choice), 9) : 9;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = '<li class="page-item"><span class="page-link">Primero</span></li>';
        $config['last_link']        = '<li class="page-item"><span class="page-link">Último</span></li>';
        $config['next_link']        = 'Siguiente';
        $config['prev_link']        = 'Anterior';
        $config['full_tag_open']    = '<nav aria-label="..." class="ms-auto"><ul class="pagination pagination-light mb-0">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" aria-current="page">';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-hidden="true">';
        $config['next_tag_close']  = '</span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
        $config['first_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;

        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);
        //$results = $this->db->get('t_users', $config['per_page'], $this->uri->segment(4))->result_array();
        //$results = User_Eloquent::skip($this->uri->segment(4))->take($config['per_page'])->get();
        //$this->data['records'] = User_Eloquent::skip($this->data['page'])->take($config['per_page'])->get();
        $data['records'] = BookEloquent::getEbooksPaginate($data['page'], $config['per_page']);

        //echo json_encode($data).'<br>';

        /*echo 'FOREACH <br>';
        foreach ($data['records'] as $row) {
    
                echo $row['id'] . ' - ';
                echo $row['title'] . ' - ';
                echo $row['type_offer'] . '\r\n<br>';
            }
    
            echo $this->pagination->create_links();
        */
    /*$data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'app/listCatalogosCardsPage';
        $this->load->view('app/templateApp', $data);
    } */

    public function view_cards($page = NULL)
    {
        /*if ($this->input->is_ajax_request()) {
*/

        if ($this->session->userdata('user_role') != NULL) {
            $search_text = is_string($this->input->post('search_key', true)) ? strip_tags(trim(strip_tags($this->input->post('search_key', true)))) : '';
            $total_row = BookEloquent::getCantSearchEbooks($search_text); //total row
            //print_r($total_row);
            $data = array();
            if ($total_row > 0) {
                $data['resultFlag'] = TRUE;
                $config['base_url'] = base_url() . '/users/catalog/';
                $data['total_row'] = BookEloquent::getCantSearchEbooks($search_text); //total row
                $config['total_rows'] = $total_row;
                $data['pagina_title'] = $this->uri->segment(2);
                $config['per_page'] = 9;  //show record per halaman
                $config['uri_segment'] = 3;
                $config['use_page_numbers'] = TRUE;
                $config['page_query_string'] = FALSE;
                $config['enable_query_strings'] = FALSE;

                $choice = $config['total_rows'] / $config['per_page'];
                //$config["num_links"] = floor($choice);
                $config['num_links'] = (fmod(floor($choice), 9) > 9) ? fmod(floor($choice), 9) : 9;

                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = '<li class="page-item"><span class="page-link">Primero</span></li>';
                $config['last_link']        = '<li class="page-item"><span class="page-link">Último</span></li>';
                $config['next_link']        = 'Siguiente';
                $config['prev_link']        = 'Anterior';
                $config['full_tag_open']    = '<nav aria-label="..." class="ms-auto"><ul class="pagination pagination-light mb-0">';
                $config['full_tag_close']   = '</ul></nav>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" aria-current="page">';
                $config['cur_tag_close']    = '</span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-hidden="true">';
                $config['next_tag_close']  = '</span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tag_close']  = '</span></li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link border-0 font-weight-bold" href="javascript:;">';
                $config['first_tag_close'] = '</span></li>';

                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;

                $str_links = $this->pagination->create_links();
                $data['links'] = explode('&nbsp;', $str_links);
                //$results = $this->db->get('t_users', $config['per_page'], $this->uri->segment(4))->result_array();
                //$results = User_Eloquent::skip($this->uri->segment(4))->take($config['per_page'])->get();
                //$this->data['records'] = User_Eloquent::skip($this->data['page'])->take($config['per_page'])->get();
                //$data['records'] = BookEloquent::getEbooksPaginate($data['page'], $config['per_page']);
                $data['records'] = BookEloquent::searchBooksPaginate($data['page'], $config['per_page'], $search_text);

                $data['pagination'] = $this->pagination->create_links();
                //$data['content'] = 'app/listCatalogosCardsPageAjax';
                //$this->load->view('app/templateApp', $data);
                //$this->load->view('app/listCatalogosCardsPageAjax', $data);
            } else {
                $data['total_row'] = BookEloquent::getCantSearchEbooks($search_text); //total row
                $data['resultFlag'] = FALSE;
                $data['resultVacio'] = 'No se encontraron libros en su búsqueda, intente con otra expresión.';
                //print_r($data);
            }
            $this->load->view('app/listCatalogosCardsPageAjax', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
        /*} else {
            //$this->session->set_flashdata('error','Error');
            redirect('/');
        }*/
    }


    public function viewPerfil()
    {
        if ($this->session->userdata('user_role') != NULL) {
            $data['content'] = 'app/viewPerfil';
            $data['perfil'] = Usereloquent::findOrFail($this->session->userdata('user_id'));
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $this->load->view('app/templateApp', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/login');
        }
    }


    public function no_repetir_email($registro)
    {
        $registro = $this->input->post();
        $usuario = UserEloquent::getUserBy('email', $registro['email']);
        if ($usuario and (!isset($registro['id']) or ($registro['id'] != $usuario->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * En caso se defina el campo mobile como único, validaremos si ya se registró anteriormente
     */
    public function no_repetir_mobile($registro)
    {
        $registro = $this->input->post();
        $usuario = UserEloquent::getUserBy('mobile', $registro['mobile']);
        if ($usuario and (!isset($registro['id']) or ($registro['id'] != $usuario->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function actualizaPerfil()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->viewPerfil();
            //en otro caso procesamos los datos
        } else {

            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') != NULL) {
                $id = $this->session->userdata('user_id');
                $data = array(
                    'mobile' => $this->input->post('mobile', true),
                    'email' => $this->input->post('email', true),
                    'address' => $this->input->post('address', true)
                );
                $model = UserEloquent::findOrFail($id);
                $model->fill($data);
                $model->save($data);
                if ($this->session->userdata('user_email') != $data['email']) {
                    $this->session->set_userdata('user_email', $data['email']);
                }
                // Display success message
                $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                redirect('/users/perfil');
            } else {
                $this->viewPerfil();
            }
        }
    }


    public function viewCredenciales()
    {
        if ($this->session->userdata('user_role') != NULL) {
            $data['content'] = 'app/viewCredencial';
            $this->load->view('app/templateApp', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/login');
        }
    }

    public function cambiarClave()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('clave_act', 'Clave Actual', 'required');
        $this->form_validation->set_rules('clave_new', 'Clave Nueva', 'required|matches[clave_rep]');
        $this->form_validation->set_rules('clave_rep', 'Repita Nueva', 'required');
        if ($this->form_validation->run() == FALSE) {
            //print_r($registro);
            //$this->session->set_flashdata('flashError', 'Verifique las claves ingresadas.');
            $this->viewCredenciales();
            //en otro caso procesamos los datos
        } else {
            if ($this->session->userdata('user_role') !== NULL) {
                $id = $this->session->userdata('user_id');
                $actual = $this->input->post('clave_act');
                $nuevo = $this->input->post('clave_new');
                $usuario = UserEloquent::find($id);
                $password = $usuario['password'];
                if (password_verify($actual, $password)) {
                    $newpassword = password_hash($nuevo, PASSWORD_BCRYPT);
                    $usuario->password = $newpassword;
                    $usuario->remember_token = base64_encode($nuevo);
                    $usuario->save();
                    $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                    redirect('/users/credenciales', 'refresh');
                } else {
                    $this->session->set_flashdata('flashError', 'Verifique las claves ingresadas.');
                    redirect('/users/credenciales', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error');
                redirect('/login');
            }
        }
    }

    public function viewpdf($id = NULL)
    {
        if ($this->session->userdata('user_role') != NULL) {
            //$data['convocatoria'] = Offerjobeloquent::findOrFail($id);
            $data['model'] = UserEloquent::findOrFail($id);
            $data['filepdf'] = BookEloquent::findOrFail($id);
            $data['content'] = 'app/ebook_pdf';
            $data['content'] = 'app/app';
            //echo json_encode($data);
            $this->load->view('app/templateApp', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/login');
        }
    }

    public function addViewEbook()
    {
        if ($this->input->is_ajax_request()) {

            if ($this->session->userdata('user_role') != NULL) {
                //$data['convocatoria'] = Offerjobeloquent::findOrFail($id);
                $data = [];
                $data['user_id'] = $this->session->userdata('user_id');
                //$book_id = $this->input->post('book_id',true);
                //$data['ebook_id'] = BookEloquent::findOrFail($book_id)->get('id');
                $data['ebook_id'] = $this->input->post('book_id', true);
                var_dump($data);
                //exit();
                $model = new ViewBookEloquent();
                $model->fill($data);
                $model->save($data);
            } else {
                $this->session->set_flashdata('error', '');
                redirect('/login');
            }
        } else {
        }
    }

    public function view_encuesta()
    {
        if ($this->session->userdata('user_role') != NULL) {
            $data['encuesta'] = EncuestaEloquent::findOrFail($this->session->userdata('user_id'));
            $data['perfil'] = Usereloquent::findOrFail($this->session->userdata('user_id'));
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $data['content'] = 'app/viewEncuesta';
            $this->load->view('app/templateApp', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/login');
        }

        //$data['encuesta'] = EncuestaEloquent::findOrFail($this->session->userdata('user_id'));
        //echo json_encode($data);
            
    }
}

/* End of file Controllername.php */