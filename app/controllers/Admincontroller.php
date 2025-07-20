<?php

use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;

defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'my_tag_helper'));
        $this->load->model('encuestaeloquent');
        $this->load->model('usereloquent');
        $this->load->model('careereloquent');
        $this->load->model('admineloquent');
        $this->form_validation->set_message('no_repetir_username', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_email', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_document', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_email_admin', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_programa', 'Existe otro programa con el mismo %s');
        /**
         * En caso se defina el campo mobile como único, validaremos si ya se registró anteriormente
         */
        $this->form_validation->set_message('no_repetir_mobile', 'Existe otro registro con el mismo %s');
    }

    public function index()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/dashboard';
            $data['cantEgres'] = UserEloquent::getCantEgres();
            $data['cantEncuestas'] = Encuestaeloquent::getCantEncuestas();
            $data['cantCareers'] = CareerEloquent::getCantCareers();
            $data['cantUsersByCareer'] = CareerEloquent::getCantEgresByCareer();
            //cantUsersByCareer
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function view_encuestas()
    {
        $data['content'] = 'admin/encuestaTable';
        $data['query'] = Encuestaeloquent::getEncuestas();
        //echo json_encode($data);
        $this->load->view('admin/templateAdmin', $data);
    }

    public function envia_encuesta()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $user = UserEloquent::find($id);
            /* Load PHPMailer library */
            $this->load->library('phpmailer_lib');
            /* PHPMailer object */
            $mail = $this->phpmailer_lib->load();                          // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->CharSet = 'UTF-8';
                //$mail->SMTPDebug = 0;                                 // 2=Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = getenv('MAIL_HOST');             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = getenv('MAIL_USERNAME');        // SMTP username
                $mail->Password = getenv('MAIL_PASSWORD');          // SMTP password
                $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');     // Enable TLS 
                $mail->Port = getenv('MAIL_PORT');            // TCP port to connect to
                //$mail->SMTPDebug = 2;

                //reply to before setfrom: https://stackoverflow.com/questions/10396264/phpmailer-reply-using-only-reply-to-address
                $mail->setFrom(getenv('MAIL_USERNAME'), getenv('APP_NAME'));
                $mail->addAddress($user['email']);     // Add a recipient

                //Content
                $mail->isHTML(true);               // Set email format to HTML
                $mail->Subject = "Encuesta para egresados";
                $datosPostulante = "Estimado " . $user['name'] . " " . $user['paternal_surname'] . ",<br>";
                $msjUsuario = "Le invitamos a ingresar al sistema para completar la encuesta: <a href=".env('APP_URL').">" . env('APP_URL') . "</a><br>";
                $mail->Body    = $datosPostulante . "<br><p>" . $msjUsuario . "</p>";
                $mail->AltBody = strip_tags($msjUsuario);
                $mail->send();
                //$status_sendemail = TRUE;
                $this->session->set_flashdata('flashSuccess', 'Correo enviado correctamente.');
            } catch (Exception $e) {
                log_message('error', "MAIL ERROR: " . $mail->ErrorInfo);
                //$status_sendemail = FALSE;
                $this->session->set_flashdata('flashError', 'Error de envio de correo.');
            }
            redirect('/admin/encuestas', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/admin');
        }
    }

    public function control()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/dashboard';
            $data['cantEstudEgres'] = UserEloquent::getCantEstudEgres();
            $data['cantCareers'] = CareerEloquent::getCantCareers();
            $data['cantBooks'] = BookEloquent::getCantEbooks();
            $data['cantPostulations'] = PostulateJobEloquent::getCantPostulations();
            $data['cantUsersByCareer'] = CareerEloquent::getCantUsersByCareer();
            $data['offersjobsLast'] = OfferJobEloquent::getOffersjobsLast();
            $data['booksLast'] = ViewBookEloquent::lastViews();
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    /**
     * CONTROL DE CONVOCATORIAS
     *  */

    public function verConvocatorias()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $career_id = $this->input->post('career_id', true);
            $data['selectValue'] = isset($career_id) ? $career_id : null;
            $data['career'] = Usereloquent::getListCareers();
            $data['query'] = OfferJobEloquent::getOffersjobsByCareer($career_id);
            //$data['query'] = Offerjobeloquent::orderBy('date_publish','desc')->get();
            //$data['query'] = Offerjobeloquent::all();
            //$data['query'] = Offerjobeloquent::getOffersjobs();
            $data['content'] = 'admin/convocatoriaTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function verConvocados($id)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['query'] = PostulateJobEloquent::getPostulationsOfferjob($id);
            $data['content'] = 'admin/convocatoriaApplicants';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function nuevaConvocatoria()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/convocatoriaNew';
            $data['career'] = Usereloquent::getListCareers();
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function creaConvocatoria()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_role') == 'admin') {
            $data = array(
                'title' => $this->input->post('title'),
                'type_offer' => $this->input->post('type_offer', true),
                'career_id' => $this->input->post('career_id', true),
                'detail' => htmlentities($this->input->post('detail', true)),
                'vacancy_numbers' => $this->input->post('vacancy_numbers', true),
                'date_publish' => $this->input->post('date_publish', true),
                'salary' => $this->input->post('salary', true),
                'date_vigency' => $this->input->post('date_vigency', true),
                'employer' => $this->input->post('employer', true),
                'ubicacion' => $this->input->post('ubicacion', true),
                'email_employer' => $this->input->post('email_employer', true),
                'turn_horary' => $this->input->post('turn_horary', true)
            );

            $model = new Offerjobeloquent();
            $model->fill($data);
            $model->save($data);
            redirect('/admin/convocatorias');
        } else {
            redirect('/admin/newconvocatoria');
        }
    }

    public function editaConvocatoria($id)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['convocatoria'] = Offerjobeloquent::findOrFail($id);
            $data['career'] = Usereloquent::getListCareers();
            $data['content'] = 'admin/convocatoriaEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function actualizaConvocatoria()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id');
            $data = array(
                'title' => $this->input->post('title'),
                'type_offer' => $this->input->post('type_offer', true),
                'career_id' => $this->input->post('career_id', true),
                'detail' => htmlentities($this->input->post('detail', true)),
                'vacancy_numbers' => $this->input->post('vacancy_numbers', true),
                'date_publish' => $this->input->post('date_publish', true),
                'salary' => $this->input->post('salary', true),
                'date_vigency' => $this->input->post('date_vigency', true),
                'employer' => $this->input->post('employer', true),
                'ubicacion' => $this->input->post('ubicacion', true),
                'email_employer' => $this->input->post('email_employer', true),
                'turn_horary' => $this->input->post('turn_horary', true)
            );

            $model = Offerjobeloquent::findOrFail($id);
            $model->fill($data);
            $model->save($data);
            redirect('/admin/convocatorias', 'refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaConvocatoria()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $model = Offerjobeloquent::find($id);
            $model->status = 0;
            $model->save();
            redirect('/admin/convocatorias', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function activaConvocatoria()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id');
            $model = Offerjobeloquent::find($id);
            $model->status = 1;
            $model->save();
            redirect('/admin/convocatorias', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    /**
     * CONTROL DE ESTUDIANTES Y EGRESADOS
     *  */
    public function verEstudiantes()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $career_id = $this->input->post('career_id', true);
            $data['selectValue'] = isset($career_id) ? $career_id : null;
            $data['career'] = Usereloquent::getListCareers();
            $data['query'] = UserEloquent::getUserEgresadosByCareer($career_id);
            //$data['query'] = UserEloquent::getUserEstudiantes();
            $data['content'] = 'admin/estudianteTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function nuevoEstudiante()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/estudianteNew';
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $data['gender'] = Usereloquent::getGender();
            $data['condEstud'] = Usereloquent::getCondicionEstudEgre();
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-16 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function no_repetir_username($registro)
    {
        $registro = $this->input->post();
        $usuario = UserEloquent::getUserBy('username', $registro['username']);
        if ($usuario and (!isset($registro['id']) or ($registro['id'] != $usuario->id))) {
            return FALSE;
        } else {
            return TRUE;
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


    public function no_repetir_document($registro)
    {
        $registro = $this->input->post();
        $usuario = UserEloquent::getUserBy('document_number', $registro['document_number']);
        if ($usuario and (!isset($registro['id']) or ($registro['id'] != $usuario->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function enviaPassword()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $user = UserEloquent::find($id);
            /* Load PHPMailer library */
            $this->load->library('phpmailer_lib');
            /* PHPMailer object */
            $mail = $this->phpmailer_lib->load();                          // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->CharSet = 'UTF-8';
                //$mail->SMTPDebug = 0;                                 // 2=Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = getenv('MAIL_HOST');             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = getenv('MAIL_USERNAME');        // SMTP username
                $mail->Password = getenv('MAIL_PASSWORD');          // SMTP password
                $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');     // Enable TLS 
                $mail->Port = getenv('MAIL_PORT');            // TCP port to connect to

                //reply to before setfrom: https://stackoverflow.com/questions/10396264/phpmailer-reply-using-only-reply-to-address
                $mail->setFrom(getenv('MAIL_USERNAME'), getenv('APP_NAME'));
                $mail->addAddress($user['email']);     // Add a recipient

                //Content
                $mail->isHTML(true);               // Set email format to HTML
                $mail->Subject = "Recuperación de contraseña";
                $datosPostulante = "Estimado " . $user['name'] . " " . $user['paternal_surname'] . ", a su solicitud;<br>";
                $msjUsuario = "Se remite su contraseña para acceder a la encuesta es: <strong>" . base64_decode($user->remember_token) . "</strong><br>";
                $mail->Body    = $datosPostulante . "<br><p>" . $msjUsuario . "</p>";
                $mail->AltBody = strip_tags($msjUsuario);
                $mail->send();
                //$status_sendemail = TRUE;
                $this->session->set_flashdata('flashSuccess', 'Correo enviado correctamente.');
            } catch (Exception $e) {
                log_message('error', "MAIL ERROR: " . $mail->ErrorInfo);
                //$status_sendemail = FALSE;
                $this->session->set_flashdata('flashError', 'Error de envio de correo.');
            }
            //redirect('/admin/estudiantes', 'refresh');
            redirect_back();
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function creaEstudiante()
    {
        //$this->_validate();
        /*$usuario = UserEloquent::getUserBy('username', $this->input->post('username'));
        //$query = $this->ci->db->get('usuarios');
        if ($usuario) {
            //redirect('/admin/newestudiante');
            //return FALSE;
            $this->nuevoEstudiante();
        } else {
            $usuario = UserEloquent::getUserBy('email', $this->input->post('email'));
            if ($usuario) {
                //return FALSE;
                $this->nuevoEstudiante();
                //redirect('/admin/newestudiante');
            } else {*/
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nuevoEstudiante();
            //en otro caso procesamos los datos
        } else {

            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $data = array(
                    'document_type' => $this->input->post('document_type'),
                    'document_number' => $this->input->post('document_number'),
                    'career_id' => $this->input->post('career_id'),
                    'name' => $this->input->post('name'),
                    'paternal_surname' => $this->input->post('paternal_surname'),
                    'maternal_surname' => $this->input->post('maternal_surname'),
                    'gender' => $this->input->post('gender'),
                    'birthdate' => $this->input->post('birthdate'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'graduated' => 'Egresado',
                    'address' => $this->input->post('address'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'remember_token' => base64_encode($this->input->post('password')),
                    'role_id' => '4'
                );
                $model = new UserEloquent();
                $model->fill($data);
                $model->save();
                //print_r($model);
                redirect('/admin/users');
            } else {
                //redirect('/admin/newestudiante');
                $this->nuevoEstudiante();
            }
            //}
        }
    }

    public function editaEstudiante($id = NULL)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $data['gender'] = Usereloquent::getGender();
            $data['condEstud'] = Usereloquent::getCondicionEstudEgre();
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-16 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
            $data['content'] = 'admin/estudianteEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function actualizaEstudiante()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->editaEstudiante($registro['id']);
            //en otro caso procesamos los datos
        } else {

            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->input->post('id');
                $data = array(
                    'document_type' => $this->input->post('document_type'),
                    'document_number' => $this->input->post('document_number'),
                    'career_id' => $this->input->post('career_id'),
                    'name' => $this->input->post('name'),
                    'paternal_surname' => $this->input->post('paternal_surname'),
                    'maternal_surname' => $this->input->post('maternal_surname'),
                    'gender' => $this->input->post('gender'),
                    'birthdate' => $this->input->post('birthdate'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'graduated' => 'Egresado',
                    'address' => $this->input->post('address')
                );

                $model = UserEloquent::findOrFail($id);
                if (password_verify($this->input->post('password'), $model->password)) {
                    $data['password'] = $model->password;
                    $data['remember_token'] = $model->remember_token;
                } else {
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                    $data['remember_token'] = base64_encode($this->input->post('password'));
                }
                $model->fill($data);
                $model->save();
                redirect('/admin/users', 'refresh');
            } else {
                $this->editaEstudiante($registro['id']);
            }
        }
    }

    public function desactivaEstudiante()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = 0;
            $model->save();
            $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
            redirect('/admin/users', 'refresh');
        } else {
            //$this->session->set_flashdata('error');
            $this->session->set_flashdata('error', 'Error en activación.');
            redirect('/login');
        }
    }

    public function activaEstudiante()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = 1;
            $model->save();
            $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' activado.');
            redirect('/admin/users', 'refresh');
        } else {
            //$this->session->set_flashdata('error');
            $this->session->set_flashdata('error', 'Error en activación.');
            redirect('/login');
        }
    }

    /**
     * CONTROL DE DOCENTES
     *  */
    public function verDocentes()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $career_id = $this->input->post('career_id', true);
            $data['selectValue'] = isset($career_id) ? $career_id : null;
            $data['career'] = Usereloquent::getListCareers();
            $data['query'] = UserEloquent::getUserDocentesByCareer($career_id);
            //$data['query'] = UserEloquent::getUserDocentes();
            $data['content'] = 'admin/docenteTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function nuevoDocente()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/docenteNew';
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $data['gender'] = Usereloquent::getGender();
            $data['condDocente'] = Usereloquent::getCondicionDocente();
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-21 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function creaDocente()
    {
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nuevoDocente();
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $data = array(
                    'document_type' => $this->input->post('document_type'),
                    'document_number' => $this->input->post('document_number'),
                    'career_id' => $this->input->post('career_id'),
                    'name' => $this->input->post('name'),
                    'paternal_surname' => $this->input->post('paternal_surname'),
                    'maternal_surname' => $this->input->post('maternal_surname'),
                    'gender' => $this->input->post('gender'),
                    'birthdate' => $this->input->post('birthdate'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'graduated' => $this->input->post('graduated'),
                    'address' => $this->input->post('address'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'remember_token' => base64_encode($this->input->post('password')),
                    'role_id' => '3'
                );

                $model = new UserEloquent();
                $model->fill($data);
                $model->save($data);
                redirect('/admin/docentes');
            } else {
                $this->nuevoDocente();
            }
        }
    }

    public function editaDocente($id)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $data['document_type'] = Usereloquent::getListDocumentType();
            $data['career'] = Usereloquent::getListCareers();
            $data['gender'] = Usereloquent::getGender();
            $data['condDocente'] = Usereloquent::getCondicionDocente();
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-21 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
            $data['content'] = 'admin/docenteEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function actualizaDocente()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->editaDocente($registro['id']);
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->input->post('id');
                $data = array(
                    'document_type' => $this->input->post('document_type'),
                    'document_number' => $this->input->post('document_number'),
                    'career_id' => $this->input->post('career_id'),
                    'name' => $this->input->post('name'),
                    'paternal_surname' => $this->input->post('paternal_surname'),
                    'maternal_surname' => $this->input->post('maternal_surname'),
                    'gender' => $this->input->post('gender'),
                    'birthdate' => $this->input->post('birthdate'),
                    'username' => $this->input->post('username'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'graduated' => $this->input->post('graduated'),
                    'address' => $this->input->post('address')
                );

                $model = UserEloquent::findOrFail($id);
                if (password_verify($this->input->post('password'), $model->password)) {
                    $data['password'] = $model->password;
                    $data['remember_token'] = $model->remember_token;
                } else {
                    $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                    $data['remember_token'] = base64_encode($this->input->post('password'));
                }
                $model->fill($data);
                $model->save();
                redirect('/admin/docentes', 'refresh');
            } else {
                $this->editaDocente($registro['id']);
            }
        }
    }

    public function desactivaDocente()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = FALSE;
            $model->save();
            $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' desactivado.');
            redirect('/admin/docentes', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function activaDocente()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = TRUE;
            $model->save();
            $this->session->set_flashdata('success', 'Usuario ' . $model['username'] . ' activado.');
            redirect('/admin/docentes', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    /**
     * CONTROL DE POSTULACIONES
     *  */

    //public function verPostulaciones($career_id = NULL)
    public function verPostulaciones()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $career_id = $this->input->post('career_id', true);
            $data['selectValue'] = isset($career_id) ? $career_id : null;
            $data['career'] = Usereloquent::getListCareers();
            //($career_id != NULL) ? ($data['selectValue'] = $career_id) : NULL;
            $data['query'] = PostulateJobEloquent::getReportPostulations($career_id);
            //echo json_encode($data['query']);
            $data['content'] = 'admin/postulacionTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function desactivaPostulacion()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id_postulacion = $this->input->post('id', true);
            //$programa = '/admin/postulaciones/' . $this->input->post('career_id');
            $model = PostulateJobEloquent::findOrFail($id_postulacion);
            $model->status = 0;
            $model->save();
            //print_r($programa);
            redirect('/admin/postulaciones', 'refresh');
            //redirect($programa . '', 'refresh');
            //redirect(site_url(uri_string()),'refresh');
            //redirect($_SERVER['REQUEST_URI'], 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function activaPostulacion()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $id_postulacion = $this->input->post('id', true);
            //$programa = '/admin/postulaciones/' . $this->input->post('career_id');
            $model = PostulateJobEloquent::find($id_postulacion);
            $model->status = 1;
            $model->save();
            //print_r($programa);
            redirect('/admin/postulaciones', 'refresh');
            //redirect($programa . '', 'refresh');
            //redirect(site_url(uri_string()),'refresh');
            //redirect($_SERVER['REQUEST_URI'], 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function verPostulacion($id = NULL)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['postulacion'] = PostulateJobEloquent::getPostulation($id);
            $data['result'] = PostulateJobEloquent::getSelectResult();
            $data['content'] = 'admin/postulacionEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function resultPostulacion()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('result', 'Resultado', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->verPostulacion($registro['id']);
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->input->post('id');
                $url_actual = '/admin/postulacion/' . $id;
                $data = array(
                    'result' => $this->input->post('result', true)
                );
                $model = PostulateJobEloquent::findOrFail($id);
                $model->fill($data);
                $model->save();
                $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                redirect($url_actual, 'refresh');
            } else {
                $this->verPostulacion($registro['id']);
            }
        }
    }

    public function viewPerfil()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['perfil'] = AdminEloquent::findOrFail($this->session->userdata('user_id'));
            $data['content'] = 'admin/adminPerfil';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }
    public function no_repetir_email_admin($registro)
    {
        $registro = $this->input->post();
        $admin = AdminEloquent::where('email', '=', $registro['email'])->first();
        if ($admin and (!isset($registro['id']) or ($registro['id'] != $admin->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function no_repetir_user_admin($registro)
    {
        $registro = $this->input->post();
        $admin = AdminEloquent::where('username', '=', $registro['username'])->first();
        if ($admin and (!isset($registro['id']) or ($registro['id'] != $admin->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function actualizaPerfil()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email_admin');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_user_admin');
        if ($this->form_validation->run() == FALSE) {
            $this->viewPerfil();
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->input->post('id');
                $data = array(
                    'name' => $this->input->post('name', true),
                    'paternal_surname' => $this->input->post('paternal_surname', true),
                    'maternal_surname' => $this->input->post('maternal_surname', true),
                    'username' => $this->input->post('username', true),
                    'mobile' => $this->input->post('mobile', true),
                    'email' => $this->input->post('email', true)
                );
                $model = AdminEloquent::findOrFail($id);
                $model->fill($data);
                $model->save();
                $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                redirect('/admin/perfil', 'refresh');
            } else {
                $this->session->set_flashdata('flashError', 'Verifique la información ingresada.');
                $this->viewPerfil();
            }
        }
    }


    public function viewClave()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/adminCredencial';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
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
            $this->viewClave();
            //en otro caso procesamos los datos
        } else {
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->session->userdata('user_id');
                $actual = $this->input->post('clave_act');
                $nuevo = $this->input->post('clave_new');
                $usuario = AdminEloquent::find($id);
                $password = $usuario['password'];
                if (password_verify($actual, $password)) {
                    $newpassword = password_hash($nuevo, PASSWORD_BCRYPT);
                    $usuario->password = $newpassword;
                    $usuario->save();
                    $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                    redirect('/admin/claves', 'refresh');
                } else {
                    $this->session->set_flashdata('flashError', 'Verifique las claves ingresadas.');
                    redirect('/admin/claves', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error');
                redirect('/login');
            }
        }
    }


    /**
     * CONTROL DE PROGRAMAS DE ESTUDIOS
     *  */

    public function verProgramas()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['query'] = Careereloquent::all();
            $data['content'] = 'admin/programasTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function editaPrograma($id)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['programa'] = Careereloquent::findOrFail($id);
            $data['content'] = 'admin/programaEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function actualizaPrograma()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_role') == 'admin') {
            $id = $this->input->post('id');
            $data = array(
                'career_title' => $this->input->post('career_title'),
            );

            $model = Careereloquent::findOrFail($id);
            $model->fill($data);
            $model->save($data);
            redirect('/admin/programas', 'refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function nuevoPrograma()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/programaNew';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function no_repetir_programa($registro)
    {
        $registro = $this->input->post();
        $programa = CareerEloquent::getCareerTitle('career_title', $registro['career_title']);
        if ($programa and (!isset($registro['id']) or ($registro['id'] != $programa->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function creaPrograma()
    {
        $this->form_validation->set_rules('career_title', 'Nombre del programa', 'required|callback_no_repetir_programa');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nuevoPrograma();
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $data = array(
                    'career_title' => $this->input->post('career_title'),
                );

                $model = new CareerEloquent();
                $model->fill($data);
                $model->save($data);
                redirect('/admin/programas');
            } else {
                $this->nuevoPrograma();
            }
        }
    }

    public function eliminaPrograma()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            /*CareerEloquent::checkProgramRecords($id_career);*/
            //var_dump($id_career);
            //$this->form_validation->set_rules('id_career', 'Programa', 'required|callback_tiene_registros');
            /*if ($this->form_validation->run() == FALSE) {
                $this->verProgramas();
                //en otro caso procesamos los datos
            } else {*/
            $id_career = $this->input->post('id_career', true);

            if (CareerEloquent::checkProgramRecords($id_career)) {
                $programa = CareerEloquent::find($id_career);
                $programa->delete();
                redirect('/admin/programas', 'refresh');
                //CareerEloquent::where('id', $id_career)->delete();
            } else {
                $this->session->set_flashdata('flashError', 'No se puede eliminar el programa seleccionado porque tiene registros.');
                redirect('/admin/programas', 'refresh');
            }

            //redirect($_SERVER['REQUEST_URI'], 'refresh');*/
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    /**
     * CARGA MODELO CV WORD
     *  */

    public function viewModeloCV()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['content'] = 'admin/uploadModeloCV';
            //$data['document'] = FCPATH . 'uploads/document/ModeloEjemplo.docx';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function uploadModeloCV()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $config['upload_path']          = FCPATH . 'uploads/document/';
            $config['allowed_types']        = 'docx';
            $config['max_size']             = 8192;
            $config['file_name']            = round(microtime(true) * 1000);
            $config['remove_spaces']        = TRUE;

            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            //print_r($_FILES);
            //print_r($this->upload->display_errors());
        }
        /*if (!$this->upload->do_upload('modelocv')) {
                //$error = array('error' => $this->upload->display_errors());
                //print_r($error); die();
                $data['error_string'] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
                $data['status'] = 0;
                $this->session->set_flashdata('flashError',$data['error_string']);
                redirect('/admin/vermodelocv','refresh');
                //echo json_encode($data);
                //$this->session->set_flashdata('flashError', 'Error de carga de archivo: ' . $this->upload->display_errors('', ''));
                //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                //exit();
                //return $data;
                //return redirect()->to($_SERVER['HTTP_REFERER'], 'refresh');
    
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('flashSuccess','Archivo reemplazado con éxito.');
                redirect('/admin/vermodelocv','refresh');
            }
            return $data;
            $data['content'] = 'admin/programasTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }*/
    }

    public function verCatalogo()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $catalog_id = $this->input->post('catalog_id', true);
            $data['selectValue'] = isset($catalog_id) ? $catalog_id : null;
            $data['catalogs'] = BookEloquent::getCatalogs();
            $data['query'] = BookEloquent::getEbooksList($catalog_id);
            //$data['query'] = Offerjobeloquent::orderBy('date_publish','desc')->get();
            //$data['query'] = Offerjobeloquent::all();
            //$data['query'] = Offerjobeloquent::getOffersjobs();
            $data['content'] = 'admin/catalogoTable';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function editaEbook($id)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['item'] = BookEloquent::findOrFail($id);
            $data['catalogs'] = BookEloquent::getCatalogs();
            $data['content'] = 'admin/ebookEdit';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function _do_upload_ebook()
    {
        $config['upload_path']          = FCPATH . 'uploads/pdf/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1048576;
        $config['file_name']            = round(microtime(true) * 10) . '_' . $_FILES['ebook_file']['name'];
        $config['remove_spaces']        = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ebook_file')) {
            //$error = array('error' => $this->upload->display_errors());
            //print_r($error); die();
            $data['error_string'] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
            $data['status'] = 0;
            //echo json_encode($data);
            //$this->session->set_flashdata('flashError', 'Error de carga de archivo: ' . $this->upload->display_errors('', ''));
            //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
            exit();
            //return $data;
            //return redirect()->to($_SERVER['HTTP_REFERER'], 'refresh');

        } else {
            $data = array('upload_data' => $this->upload->data());
            //print_r("Funciona!!");
            //exit();
            //$route_filecv = $data['full_path'];
            //print_r($data);
            //return $data;
            //$this->load->view('upload_success', $data);
        }
        return $data;
    }

    public function actualizaEbook()
    {
        //$this->_validate();
        try {
            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_role') == 'admin') {
                $id = $this->input->post('id');
                $checkFile = $this->input->post('checkFile');
                $data = array(
                    'ebook_code' => $this->input->post('ebook_code') ? trim($this->input->post('ebook_code')) : NULL,
                    'ebook_isbn' => $this->input->post('ebook_isbn', true) ? trim($this->input->post('ebook_isbn', true)) : NULL,
                    'ebook_title' => $this->input->post('ebook_title', true) ? trim($this->input->post('ebook_title', true)) : NULL,
                    'ebook_details' => $this->input->post('ebook_details', true) ? htmlspecialchars(trim($this->input->post('ebook_details', true))) : NULL,
                    'ebook_display' => $this->input->post('ebook_display', true) ? trim($this->input->post('ebook_display', true)) : NULL,
                    'ebook_type' => $this->input->post('ebook_type', true),
                    'ebook_author' => $this->input->post('ebook_author', true),
                    'ebook_editorial' => $this->input->post('ebook_editorial', true),
                    'ebook_year' => $this->input->post('ebook_year', true),
                    'ebook_pages' => $this->input->post('ebook_pages', true) ? $this->input->post('ebook_pages', true) : 9999,
                    'ebook_front_page' => $this->input->post('ebook_front_page', true),
                    'catalog_id' => $this->input->post('catalog_id', true)
                );
                $checkFile = isset($checkFile) ?? 0;
                //var_dump($checkFile);
                //if (!empty($_FILES))  $checkFile=55;
                //var_dump($checkFile);
                //var_dump($_FILES);
                //exit();
                //$this->_do_upload_ebook();
                //exit();
                if ($checkFile) {
                    if (!empty($_FILES)) {
                        $upload = $this->_do_upload_ebook();
                        if ($upload) {
                            $data['ebook_url'] = $upload['upload_data']['full_path'];
                            $data['ebook_file'] = $upload['upload_data']['file_name'];
                            $model = BookEloquent::findOrFail($id);
                            $model->fill($data);
                            $model->save($data);
                            $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                            redirect_back();
                        } else {
                            $this->session->set_flashdata('flashError', 'Error de carga de archivo. Intente nuevamente.');
                            //$this->viewConvocatoria($data['offer_id']);
                            //redirect('users/convocatoria/' . $data['offer_id']);
                            //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                            redirect_back();
                            exit();
                            //return FALSE;
                        }
                    } else {
                        $this->session->set_flashdata('flashError', 'Error de carga de archivo. Intente nuevamente.');
                        exit();
                    }
                } else {
                    //redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                    $model = BookEloquent::findOrFail($id);
                    $model->fill($data);
                    $model->save($data);
                    $this->session->set_flashdata('flashSuccess', 'Actualización exitosa, no se modifica el PDF.');
                    redirect_back();
                    //$this->session->set_flashdata('flashError', 'Error de carga de archivo.');
                    //redirect_back(); 
                }
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('flashError', $e->getMessage());
            exit();
        }
    }

    public function verLibro($id = NULL)
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['book'] = BookEloquent::selectEbook($id);
            $data['content'] = 'admin/ebookView';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function ultimosLibrosVistos()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['books'] = ViewBookEloquent::lastViews();
            $data['content'] = 'admin/ebookView';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function viewClientInfo()
    {
        if ($this->session->userdata('user_role') == 'admin') {
            //$data['books'] = ViewBookEloquent::lastViews();
            $data['content'] = 'admin/clientInfo';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }

    public function countReaders()
    {
        //$example = [];
        //$data['example']=ViewBookEloquent::getNumberViewsByBook();
        //print_r(json_encode($example));

        if ($this->session->userdata('user_role') == 'admin') {
            $catalog_id = $this->input->post('catalog_id', true);
            $data['selectValue'] = isset($catalog_id) ? $catalog_id : null;
            $data['catalogs'] = BookEloquent::getCatalogs();
            $data['query'] = ViewBookEloquent::getNumberViewsByBook($catalog_id);
            $data['content'] = 'admin/catalogoReporte';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }


    public function viewReaders($ebook_id = NULL)
    {
        //$example = [];
        //print_r($id);
        /*
        $example = ViewBookEloquent::getListReadersByBook($ebook_id);
        print_r(json_encode($example));
        */

        if ($this->session->userdata('user_role') == 'admin') {
            $data['records'] = ViewBookEloquent::getListReadersByBook($ebook_id);
            $data['content'] = 'admin/ebookReaders';
            $this->load->view('admin/templateAdmin', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/login');
        }
    }
}
/* End of file Controllername.php */