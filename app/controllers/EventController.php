 <?php
use Phalcon\Mvc\View;

class EventController extends ControllerBase {

  ////////////////////////////////////////////////////////////////////////////////////////////////

  public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
	  $this->checkAuthen();
   } 
  
   public function initialize()
   {
     parent::initialize();
      $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
      $this->view->setTemplateAfter('maintemplate');
   }

    public function indexAction(){
      if($this->request->isPost()){
 
        $eventphoto='';

	    $eventname = trim($this->request->getPost('e_Name'));
      $eventdate = trim($this->request->getPost('e_Date')); // รับค่าจาก form     
      $eventdetail = trim($this->request->getPost('e_Des')); // รับค่าจาก form
	   
	  $eventObj = new Event();
      $eventObj->e_name=$eventname;
      $eventObj->e_date=$eventdate;
      $eventObj->e_des=$eventdetail;
      $eventObj->e_img=$eventphoto;
      $eventObj->save();

      $this->response->redirect('authen');
    }else
    $eventname=$this->session->get('memberAuthen');
	  $event=Event::findFirst($eventname);
  }

    public function addtableAction(){

        if($this->request->isPost()){
          $ev=new Event();
          $ev->e_name=$this->request->getPost('e_Name');
          $ev->e_date=$this->request->getPost('e_Date');
          $ev->e_des=$this->request->getPost('e_Des');
          $ev->e_img=$this->request->getPost('e_Img');
          $ev->save();
          $this->response->redirect('event');}
      // }else{
      //   $eventlist = Event::findFirst($eName);
  
      //   $eventname = trim($this->request->getPost('e_Name')); 
      //   $eventdate = trim($this->request->getPost('e_Date')); // รับค่าจาก form     
      //   $eventdetail = trim($this->request->getPost('e_Des')); // รับค่าจาก form
  
      //   $eventlist->e_name=$eventname;
      //   $eventlist->e_date=$eventdate;
      //   $eventlist->e_des=$eventdetail;
      //   $eventlist->e_img=$eventphoto;
      //   $eventlist->save();
      //   $this->response->redirect('event'); 
      // }
  }
  
    public function deleteAction($e){

      $toDeleteEvent = Event::findFirst($this->$e);
      $toDeleteEvent->delete();
      $this->response->redirect('event');

    }

    public function editAction(){
      // if ($this->request->isPost()) {
    
        // $name = trim($this->request->getPost('e_Name')); // รับค่าจาก form
        // $date = trim($this->request->getPost('e_Date')); // รับค่าจาก form
        // $des = trim($this->request->getPost('e_Des')); // รับค่าจาก form
    
        // $event = Event::findFirst($e);
        // $event->e_name = $name;
        // $event->e_date = $date;
        // $event->d_des = $des;
        // $event->save();
        // $this->response->redirect('event'); 
    // }
    // $event = Event::findFirst($id);
    // $this->view->event = $event;
    }
  
}

