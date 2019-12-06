<?php


namespace App\Modules\Accounting\Documents;



class Documents
{
    private $collection;
    public function __construct(array $documents)
    {
        foreach ($documents as $document)
            if($document instanceof Document)
                $this->collection[]=$document;
    }
    public function getCollection()
    {
        return $this->collection;
    }
    public function addDocumetn(Document $document)
    {
        $this->collection[]=$document;
        return $this;
    }
    public function getDocumentById($id)
    {
        foreach ($this->collection as $document){
            if($document->getId == $id)
                return $document;
        }
    }
    public function removeDocumentById($id,$returnDocument=false)
    {
        foreach ($this->collection as $key=>$document){
            if($document->getId() == $id){
                if($returnDocument){
                    $document = clone $this->collection[$key];
                    unset($this->collection[$key]);
                    return $document;
                }else{
                    unset($this->collection[$key]);
                }
            }
        }
    }

}