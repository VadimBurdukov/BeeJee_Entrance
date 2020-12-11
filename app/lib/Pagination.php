<?
namespace app\lib;

class Pagination {
    
    public $taskPerPage = 3;
    private $route;
    private $current_page;
    private $total;

 	public function __construct($route, $total) {
        $this->route = $route;
        $this->total = (int)$total;
        $this->amount = $this->amount();
        $this->setCurrentPage();
    }

    public function getPagination(){
    	$elems = null;
    	$html = '<nav><ul class="pagination">';
    	for ($page=1; $page <= $this->amount; $page++) { 
    		if($page == $this->current_page){
    			$elems .= '<li class="page-item active"><span class="page-link">'.$page.'</span></li>';
    		} else {
    			$elems .= $this->generateLink($page);
    		}
    	}
    	if(!is_null($elems)){
    		if ($this->current_page < $this->amount) {
                $elems .= $this->generateLink($this->current_page + 1, 'Вперед');
            }
            if ($this->current_page > 1) {
                $elems = $this->generateLink($this->current_page - 1, 'Назад').$elems;
            }
    	}
    	$html .= $elems.' </ul></nav>';
    	return $html;
    }

    private function generateLink($page, $text = null){
    	if(!$text)
    		$text = $page;
    	return '<li class="page-item"><a class="page-link" href="/'.$page.'">'.$text.'</a></li>';
    }

    private function setCurrentPage() {
        $currentPage = $this->route['page'] ?? 1;
        $this->current_page = $currentPage;
        
        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount) {
                $this->current_page = $this->amount;
            }
        } else {
            $this->current_page = 1;
        }
    }

    private function amount(){
    	return ceil($this->total / $this->taskPerPage);
    }

 	private function limits() {
        $left = $this->current_page - round($this->max / 2);
        $start = $left > 0 ? $left : 1;
        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max;
        }
        else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }
}
?>