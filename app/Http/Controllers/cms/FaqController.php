<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Topic;
use Illuminate\Http\Request;
// use App\Http\Requests\cms\courseFaqRequest;
use App\Http\Requests\CourseFaqRequest as RequestsCourseFaqRequest;

class FaqController extends Controller
{
    public function index($type, $id)
    {
        switch ($type) {
            case 'course':
                $result['data'] = Course::with('faqs')->find($id);
                break;

            case 'topic':
                $result['data'] = Topic::with('faqs')->find($id);
                break;
            case 'category':
                $result['data'] = Category::with('faqs')->find($id);
                break;
        }
        return view('cms.faq.list', $result, compact('type'));
    }

    public function createFaq($type ,$id)
    {
        $result['data'] = new Faq();
        $result['data']['module_type'] = $type;
        $result['data']['module_id'] = $id;
        
        return view('cms.faq.faqForm', $result);
    }

    public function insertFaq(RequestsCourseFaqRequest $request)
    {
        // $this->authorize('create', new Faq());
        $module_type = $request->get('module_type');
        $module_id   = $request->get('module_id');
        switch ($module_type) {

            case "topic":
                $module = Topic::find($module_id);
                break;

            case "course":
                $module = Course::find($module_id);
                break;

            case "category":
                $module = Category::find($module_id);
                break;

            default:
                \session::flash('failure', 'unknown faq module!');
                return back();
                break;
        }

        $id    = $request->id;
        $question = $request->question;
        $answer   = $request->answer;

        // save faq if id is not 
        if (empty($id)) {
            $module->faqs()->create([
                'question' => $question,
                'answer'    => $answer,
                'display_order' => $module->faqs()->count() + 1
            ]);
            $message = 'Added';
        } else {
            // update existing faq
            $faq = Faq::find($id);
            if (!empty($faq)) {
                $faq->question = $question;
                $faq->answer   = $answer;
                $faq->save();
            }
            $message = 'Updated';
        }

        return redirect()->route('faqList', ['type' => $module_type, 'id' => $module_id])->with('success', "FAQ $message!");
    }

    public function editFaq($id)
    {
        $result['data'] = Faq::find($id);

        return view('cms.faq.faqForm', $result); 
        
    }

    public function deleteFaq(Faq $faq)
    {
        // $this->authorize('delete', new Faq());
        $faq->delete();
    }

    public function sortFaq(Request $request)
    {
        // dd($request->all());
        // $this->authorize('update', new Faq());
        $ids = $request->get('id');
        foreach($ids as $i => $id)
        {
            Faq::where('id',$id)->update(['display_order'=>$i+1]);
        }
    }

}
