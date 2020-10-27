<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\AppointmentForm;
use app\models\Appointment;
use app\models\AddpetForm;
use app\models\Pet;
use app\models\Review;
use app\models\ReviewForm;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->getId();
        $model = new AppointmentForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $appoint = new Appointment();
            $appoint->date = $model->date;
            $appoint->pet = $model->pet;
            $appoint->service = $model->service;
            $appoint->symptoms = $model->symptoms;
            $appoint->host = $id;
            if($appoint->save())
            {
                return $this->goBack();
            }
        }
        return $this->render('index', compact('model'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
        return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->render('profile', [
            'username' => $username, 
            'user' => $user
        ]);
        }

        $model->password = '';
        return $this->render('login', [
        'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSign_up()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $user = new User();
            $user->name = $model->name;
            $user->surname = $model->surname;
            $user->username = $model->username;
            $user->password = $model->password;
            $user->email = $model->email;
            if($user->save())
            {
                return $this->render('profile', [
            'username' => $username, 
            'user' => $user
        ]);
            }
        }
        return $this->render('sign_up', compact('model'));
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionReviews()
    {
        $id = Yii::$app->user->getId();

        $user = User::find()->where(['id'=>$id])->one();
        if($user){
            $username = $user->username;
        }
        else $username = 'Sign in to leave a review';

        $model = new ReviewForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $review = new Review();
            $review->author_id = $id;
            $review->text = $model->text;
            if($review->save())
            {
                return $this->goBack();
            }
        }

        $reviews = Review::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $reviews->count()
        ]);

        $reviews = $reviews->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('reviews', compact('model', 'username', 'reviews', 'pagination'));
    }

    public function actionProfile()
    {
        $this->view->registerCssFile('/web/css/profile.css', ["type" => "text/css"]);

        $id = Yii::$app->user->getId();

        $user = User::find()->where(['id'=>$id])->one();
        if($user){
            $username = $user->username;
        }

        return $this->render('profile', [
            'username' => $username, 
            'user' => $user
        ]);
    }

    public function actionAdd_pet()
    {
        $id = Yii::$app->user->getId();
        $model = new AddpetForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            $pet = new Pet();
            $pet->name = $model->name;
            $pet->kind = $model->kind;
            $pet->breed = $model->breed;
            $pet->age = $model->age;
            $pet->host = $id;
            if($pet->save())
            {
                return $this->goBack();
            }
        }
        return $this->render('add_pet', compact('model'));
    }
}
