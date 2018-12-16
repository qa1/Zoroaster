<?php

    namespace KarimQaderi\Zoroaster\Http\Controllers\Resource;

    use App\Http\Controllers\Controller;
    use KarimQaderi\Zoroaster\Http\Requests\ResourceRequest;

    class ResourceEditController extends Controller
    {
        public function handle(ResourceRequest $ResourceRequest)
        {

            $resources = $ResourceRequest->Model()->findOrFail(($ResourceRequest->RequestParameters()->resourceId));

            $ResourceRequest->authorizeTo($ResourceRequest->Resource()->authorizeToUpdate($resources));



            return view('Zoroaster::resources.Form')->with([
                'request' => $ResourceRequest ,
                'resourceClass' => $ResourceRequest->Resource() ,
                'model' => $ResourceRequest->Model() ,
                'resources' => $resources ,
                'fields' => $ResourceRequest->RenderViewForm($ResourceRequest->Resource()->fields() ,
                    function($field){
                        if(!isset($field->showOnUpdate)) return true;
                        if($field->showOnUpdate == true)
                            return true;
                        else
                            return false;
                    } ,
                    'viewForm' , $resources , $ResourceRequest) ,
            ]);
        }


    }