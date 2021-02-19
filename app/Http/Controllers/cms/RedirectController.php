<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\RedirectRequest;
use App\Models\UrlRedirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RedirectController extends Controller
{
    
    public function UrlRedirectList(Request $request)
    {
        $this->authorize('view', new UrlRedirect());    
        $source        =    $request->get('source',null);
        $target        =    $request->get('target',null);
         
            $query = UrlRedirect::query();
            if($request->has('exact_match'))
            {
            $query = empty($source)? $query : $query->where("source_url","LIKE","{$source}");
            $query = empty($target)? $query : $query->where("target_url","LIKE","{$target}");
            }
            else
            {
            $query = empty($source)? $query : $query->where("source_url","LIKE","%{$source}%");
            $query = empty($target)? $query : $query->where("target_url","LIKE","%{$target}%");
            }
            // $data['urls'] =$result;
            $query->orderBy('source_url');
            $result = $query->paginate(10);
            $data['urls'] =$result;
            return view('cms.urlredirect.urlredirect',$data);
    }
    public function create()
    {
        $this->authorize('create', new UrlRedirect());
        $data['url'] = new UrlRedirect();
        $data['submitRoute'] = "insertUrlRedirect";
        return view('cms.urlredirect.urlRedirectForm',$data);
    }
 

    public function insert(RedirectRequest $request)
    {
        $url=new UrlRedirect();
        $this->authorize('create',$url);
        $source= $request->source_url;
         $target=$request->target_url;
        if(Str::endsWith($source,'/')  or Str::endsWith($source,'\\') or Str::contains($source,'?') )
        {
            \Session::flash('failure', 'error in source url');
            $validator = Validator::make([],[]);
            $validator->errors()->add("source_url",'Url cannot ends with slash or contain ?');
            throw new \Illuminate\Validation\ValidationException($validator);
        }
        
       if(Str::endsWith($target,'/')  or Str::endsWith($target,'\\'))
        {
            \Session::flash('failure', 'error in target url');
            $validator = Validator::make([],[]);
            $validator->errors()->add("target_url",'Url cannot ends with slash ');
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        $url->source_url=$source;
        $url->target_url=$target;
        
     
        $url->save();
        if(!empty($url->id))
        \Session::flash('success', 'Url created!');
        return redirect()->route('urlRedirectList')->with('success','URL Created');

    }
    public function  edit(UrlRedirect $url)
    {
        $this->authorize('update',$url);
        $data['url'] = $url;
        $data['submitRoute'] = array('updateUrlRedirect',$url->id);
        return view("cms.urlredirect.urlRedirectForm",$data);
    }

    public function delete(UrlRedirect $url)
    {
        $this->authorize('delete',$url);
        $url->delete();

    }

    
    public function update(UrlRedirect $url,RedirectRequest $request)
    {
        $this->authorize('update',$url);
        $source = $request->source_url;
        if(Str::endsWith($source,'/')  or Str::endsWith($source,'\\') or Str::contains($source,'?') )
        {
            $validator = Validator::make([],[]);
            $validator->errors()->add("source_url",'Url cannot ends with slash or contain ?');
            throw new \Illuminate\Validation\ValidationException($validator);
        }
        $url->source_url=$request->source_url;
        $url->target_url=$request->target_url;
        $url->save();
        return redirect()->route('urlRedirectList')->with('success','URL Updated');
        
    }
}
