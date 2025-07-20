<?php

use Db\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;

use Models\Usereloquent;

class EncuestaEloquent extends BaseModel
{

    protected $table = 't_encuestas';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',      //ID usuario
        'flag_start',      //Encuesta iniciada
        'flag_end',      //Encuesta finalizada
        'var1',      //Fecha de aplicación de la ficha
        'var2',      //Fecha de envío
        'var3',      //Fecha de cierre
        'var4',      //Correo Electrónico
        'var5',      //Celular
        'var6',      //Telf. de referencia
        'var7',      //Tienes alguna Discapacidad
        'var8',      //Carrera/ Especialidad / Opción ocupacional que egreso
        'var9',      //Año de ingresó
        'var10',      //Año de egreso
        'var11',      //¿Es titulado?
        'var12',      //Año que se tituló
        'var13',      //Actualmente te encuentras trabajando?
        'var14',      //Si trabajas, para quién lo haces?
        'var15',      //Si trabajas en una institución pública…
        'var16',      //Empresa privada, cuentas con
        'var17',      //Independiente (Esto se refiere a un trabajo por tu cuenta propia). Si marcaste la opción Independiente, pasar a la pregunta 28
        'var18',      //¿Cuál fue tu ingreso del mes pasado? (S/.)
        'var19',      //¿En qué área de trabajo te desempeñas actualmente en la institución o empresa que trabajas?
        'var20',      //Tu empleo está relacionado con la carrera, especialidad u ocupación que estudiaste?
        'var21',      //A qué actividad económica se dedica la institución y/o empresa en la que trabajas?
        'var22_1',      //¿Que medios usas para buscar empleos?
        'var22_2',      //¿Que medios usas para buscar empleos?
        'var22_3',      //¿Que medios usas para buscar empleos?
        'var22_4',      //¿Que medios usas para buscar empleos?
        'var22_5',      //¿Que medios usas para buscar empleos?
        'var22_6',      //¿Que medios usas para buscar empleos?
        'var22_7',      //¿Que medios usas para buscar empleos?
        'var22_8',      //¿Que medios usas para buscar empleos?
        'var23',      //¿Cuántos empleos has tenido en el último año?
        'var24',      //¿Cuántos empleos han sido de tu carrera?
        'var25',      //¿Nombre de la Empresa donde actualmente laboras?
        'var26',      //Nombre del jefe inmediato
        'var27_1',      //Teléfono de la empresa
        'var27_2',      //Página web y/o correo electrónico
        'var28',      //Si trabajas independiente ¿Tienes un negocio o empresa que formaste?
        'var29',      //¿Cuántos trabajadores tienes en tu negocio o empresa que formaste? (Considera a familiares que trabajan contigo)
        'var30',      //Tu negocio o empresa que formaste, está constituida como:
        'var31',      //A qué actividad económica se dedica tu negocio o la empresa formaste
        'var32',      //¿Según tu experiencia laboral, la formación técnica profesional recibida te sirvió para desempeñarte adecuadamente en tu trabajo?
        'var33',      //¿Tu formación técnico profesional te permitió acceder a un empleo en la misma región en la que estudiaste?
        'var34',      //¿La formación recibida, te facilita adecuarte a los cambios tecnológicos?
        'var35',      //
        'var36',      //
        'var37',      //
        'var38',      //
        'var39',      //
        'var40',      //
        'var41',      //
        'var42',      //
        'var43',      //
        'var44',      //
        'var45',      //
        'var46',      //
        'var47',      //
        'var48',      //
        'var49',      //
        'var50',      //
    ];

    protected $dates = ['var1', 'var2', 'var3', 'created_at', 'updated_at'];

    protected $casts = [
        'status' => 'boolean',
        'flag_start' => 'boolean',
        'flag_end' => 'boolean'
    ];

    protected $appends = ['flag', 'flagInicio', 'flagFin', 'flagEnvio', 'flagAvance'];

    public function getFlagAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->status) {
            return 'Activo';
        } else {
            return 'No activo';
        }
    }

    public function getFlagEnvioAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->var2) {
            return 'Enviada';
        } else {
            return 'Para envío';
        }
    }

    public function getFlagInicioAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->flag_start) {
            return 'Sí';
        } else {
            return 'No';
        }
    }

    public function getFlagFinAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->flag_end) {
            return 'Encuesta finalizada';
        } else {
            return 'Encuesta no finalizada';
        }
    }

    public function getFlagAvanceAttribute()
    {
        //return date_diff(date_create($this->date_vigency), date_create('now'))->d;
        //https://blog.devgenius.io/how-to-find-the-number-of-days-between-two-dates-in-php-1404748b1e84
        //return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');return date_diff(date_create('now'),date_create($this->date_vigency))->format('%R%a days');
        if ($this->var7 != '') {
            return '5.00';
        } else {
            return '0.00';
        }
    }

    public static function getEncuesta($user_id = NULL)
    {
        $data = array();
        if ($user_id == NULL) {
        } else {
            $data['encuesta_user'] = EncuestaEloquent::leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
                ->leftjoin('t_careers', 't_encuestas.career_id', '=', 't_careers.id')
                ->select('t_encuestas.id', 't_encuestas.user_id', 't_careers.career_title', 't_encuestas.career_id', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.graduated', 't_users.mobile', 't_encuestas.updated_at')
                ->orderBy('t_encuestas.updated_at', 'desc')
                ->first();
        }
        return $data;
    }

    public static function getEncuestas()
    {
        $data = array();

        $data = EncuestaEloquent::leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
            ->leftjoin('t_careers', 't_users.career_id', '=', 't_careers.id')
            ->leftjoin('t_document_type', 't_users.document_type', '=', 't_document_type.id')
            ->selectRaw(
                't_encuestas.id,
                t_encuestas.user_id,
                t_encuestas.updated_at,
                t_encuestas.flag_start,
                t_encuestas.flag_end,
                t_encuestas.status,
                t_encuestas.var1,
                t_encuestas.var2,
                t_encuestas.var9,
                t_encuestas.var10,
                t_careers.career_title,
                t_users.career_id,
                t_users.name,
                t_users.paternal_surname,
                t_users.maternal_surname,
                t_users.email,
                t_users.graduated,
                t_users.mobile,
                t_document_type.document_type_label,
                ROW_NUMBER() OVER(ORDER BY t_encuestas.updated_at ASC) AS row'
            )
            ->orderBy('t_encuestas.updated_at', 'desc')
            ->get();

            /*->select(
                't_encuestas.id',
                't_encuestas.user_id',
                't_encuestas.updated_at',
                't_encuestas.flag_start',
                't_encuestas.flag_end',
                't_encuestas.status',
                't_encuestas.var1',
                't_encuestas.var2',
                't_encuestas.var9',
                't_encuestas.var10',
                't_careers.career_title',
                't_users.career_id',
                't_users.name',
                't_users.paternal_surname',
                't_users.maternal_surname',
                't_users.email',
                't_users.graduated',
                't_users.mobile',
                't_users.mobile',
                't_users.mobile',
                't_document_type.document_type_label'
            )*/

        return $data;
    }

    public static function getPostulation($id)
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        return PostulateJobEloquent::leftjoin('t_encuestas', 't_encuestas.offer_id', '=', 't_encuestas.id')
            ->leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
            ->leftjoin('t_careers', 't_encuestas.career_id', '=', 't_careers.id')
            ->select('t_encuestas.id', 't_encuestas.user_id', 't_encuestas.offer_id', 't_encuestas.career_id', 't_encuestas.employer', 't_encuestas.email_employer', 't_encuestas.turn_horary', 't_encuestas.ubicacion', 't_encuestas.msg_postulant', 't_encuestas.result', 't_encuestas.date_postulation', 't_encuestas.review', 't_encuestas.status', 't_encuestas.filecv', 't_careers.career_title', 't_encuestas.title', 't_encuestas.salary', 't_encuestas.type_offer', 't_encuestas.detail', 't_encuestas.date_publish', 't_encuestas.date_vigency', 't_encuestas.vacancy_numbers', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.username', 't_users.mobile', 't_users.document_type', 't_users.document_number', 't_users.graduated')
            ->where('t_encuestas.id', '=', $id)
            ->first();
    }

    public static function getCantEncuestas()
    {
        return EncuestaEloquent::where('status', 1)->count();
    }


    public static function getSelectResult()
    {
        $results = DB::table('t_result_postulate')
            ->select('id', 'detail_label')
            ->get();

        $lista = array();

        foreach ($results as $result) {
            $lista[$result->id] = $result->detail_label;
        }
        return $lista;
    }

    public static function getReportPostulations($career_id = NULL)
    {
        if ($career_id == NULL) {
            return PostulateJobEloquent::leftjoin('t_encuestas', 't_encuestas.offer_id', '=', 't_encuestas.id')
                ->leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
                ->leftjoin('t_careers', 't_encuestas.career_id', '=', 't_careers.id')
                ->select('t_encuestas.id', 't_encuestas.user_id', 't_encuestas.offer_id', 't_encuestas.result', 't_encuestas.date_postulation', 't_encuestas.filecv', 't_encuestas.status', 't_encuestas.title', 't_encuestas.type_offer', 't_encuestas.date_publish', 't_encuestas.date_vigency', 't_encuestas.salary', 't_encuestas.vacancy_numbers', 't_careers.career_title', 't_encuestas.career_id', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.graduated', 't_users.mobile', 't_encuestas.updated_at')
                ->orderBy('t_encuestas.updated_at', 'desc')
                ->get();
        } else {
            return PostulateJobEloquent::leftjoin('t_encuestas', 't_encuestas.offer_id', '=', 't_encuestas.id')
                ->leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
                ->leftjoin('t_careers', 't_encuestas.career_id', '=', 't_careers.id')
                ->select('t_encuestas.id', 't_encuestas.user_id', 't_encuestas.offer_id', 't_encuestas.result', 't_encuestas.date_postulation', 't_encuestas.filecv', 't_encuestas.status', 't_encuestas.title', 't_encuestas.type_offer', 't_encuestas.date_publish', 't_encuestas.date_vigency', 't_encuestas.salary', 't_encuestas.vacancy_numbers', 't_careers.career_title', 't_encuestas.career_id', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.graduated', 't_users.mobile', 't_encuestas.updated_at')
                ->where('t_encuestas.career_id', '=', $career_id)
                ->orderBy('t_encuestas.updated_at', 'desc')
                ->get();
        }
    }

    public static function checkPostulationUser($idUser, $idOffer)
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        $check = PostulateJobEloquent::leftjoin('t_encuestas', 't_encuestas.offer_id', '=', 't_encuestas.id')
            ->leftjoin('t_users', 't_encuestas.user_id', '=', 't_users.id')
            ->select('t_encuestas.id', 't_encuestas.user_id', 't_encuestas.offer_id')
            ->where('t_encuestas.user_id', '=', $idUser)
            ->where('t_encuestas.offer_id', '=', $idOffer)
            ->first();

        if ($check) {
            return true;
        } else {
            return false;
        }
    }
}
