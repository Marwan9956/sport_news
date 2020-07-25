<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
//Models
use App\news_header;
use App\news_body;
use App\news_type;
use App\headlines_news;
use App\Exceptions\StoringDataException;
use Session;


class news_controller extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['']);
    }

    public function show_all_list(){
        $newsHeaderList = news_header::all();
        return view('showLists')->with('newsHeaderList',$newsHeaderList);
    }
    /**
     * Headlines Part
     */
    public function show_all_headlines($id){
        $headLines = news_header::find($id)->headLines()->get();
        return view('showHeadLines')->with('headLines',$headLines);
    }

    public function edit_headlines($id){
        return 'create edit headlines';
    }

    public function delete_headlines($id){
        $headLines = headlines_news::find($id);
        try{
            if(!$headLines->delete()){
                throw new StoringDataException('Headlines has not been removed try again . ');   
            }
            return redirect()->back()->with('success','Headlines Deleted successfully .');
        }catch(StoringDataException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }catch(Exception $e){
            return redirect()->back()->withErrors('Server Error Try Again later. ');
        }
    }

    /**
     * News Body Part
     */
    public function show_news_post_by_list($listID){

    }

    public function create_form_new_list(){
        return view('forms.news_header');
    }

    


    public function store_list(Request $req){
        $messages = array(
            'headLines.required' => 'At least one :attribute field is required.'
        );
        //validate data
        $validate = Validator::make($req->all(),[
            'title' => 'required|max:255|min:8',
            'headText' => 'required|min:12',
            'headLines' => 'required'
        ],$messages);


        if ($validate->fails()) { 
            return redirect()->back()
                ->withErrors($validate) // send back all errors to the login form
                ->withInput();
        } else {
            DB::beginTransaction();
            try {
                //Store Data in news_header
                $newsHeader = new news_header();
                $newsHeader->title = $req->title;
                $newsHeader->headText = $req->headText;
                

                if(!$newsHeader->save()){
                    throw new StoringDataException('data did not been added successfully . ');
                }

                //check how many head lines 
                $loop = true;
                $headLines = [];
                array_push($headLines,$req->headLines);
                $counter = 0;
                while($loop){
                    if(!isset($req['headLines'.$counter])){
                        $loop = false;
                        break;
                    }
                    array_push($headLines,$req['headLines'.$counter]);
                    $counter++;
                }

                //Insert data to headlines_news
                foreach($headLines as $post){
                    $newHeadLines = new headlines_news;
                    $newHeadLines->text = $post;
                    $newHeadLines->news_header_id = $newsHeader->id;
                    if(!$newHeadLines->save()){
                        throw new StoringDataException('data did not been added successfully . ');
                    }
                }
                DB::commit();

            } catch (StoringDataException $e) {
                DB::rollback();
                //return response()->json(['error' => $e->getMessage()], 500);
                return redirect()->back()
                ->withErrors($e->getMessage())
                ->with('counter', $counter )
                ->withInput();
                
            } catch (Exception $e){
                return redirect()->back()
                ->withErrors('Error : Server Error Try again .')
                ->with('counter', $counter )
                ->withInput();
            }
            
            
            //Store headlines 
            
            return redirect('/home')->with('success', 'Your new List has been added successfully');   
        }  
        
    }
    /**
     * Display adding news Form 
     */
    public function news_post_form(){
        //Grap Types and send it to view
        $newsTypes = news_type::orderBy('type_name', 'asc')->get();
        return view('forms.news_body')->with('newsTypes',$newsTypes);
    }

    /**
     * Perform Insertion of data in Database
     */
    public function news_post(Request $req){
        $validate = $req->validate([
            'title' => 'required|min:6',
            'Body'  => 'required|min:12',
            'newsType' => 'required'
        ]);
        
        
        try{
            $newsHeaderID = news_header::latest()->first()->id;
            $news = new news_body;
            $news->title = $req->title;
            $news->body  = $req->Body;
            $news->type_id = $req->newsType;
            $news->news_header_id = $newsHeaderID;
            $news->logo_url = 'Default Value to be adjusted';

            if(!$news->save()){
                throw new StoringDataException('Error : Your Data has Not been added try again.');
            }

            //success
            return redirect('/home')->with('success','News post added successfully.');
            
        }catch(StoringDataException $e){
            return redirect()->back()
                    ->withErrors($e->getMessage())
                    ->withInput();
        }catch(Exception $e){
            return redirect()->back()
                    ->withErrors('Error : Server Error Try Again.')
                    ->withInput();
        }
    }


    /**
     * Categories Section
     */
    public function categories_display(){
        $categories = news_type::all();
        return view('categories')->with('categories',$categories);
    }
 
    public function categories_form(){
        return view('forms.categories');
    }

    public function categories_store(Request $req){
        $validate = $req->validate([
            'category_name' => 'required',
            'description'   => 'required'
        ]);

        $newsType = new news_type;
        $newsType->type_name = $req->category_name;
        $newsType->description = $req->description;
        try{
            if(!$newsType->save()){
                throw new StoringDataException('Error: new category has not been added successfully.');
            }
            return redirect('/news/categories')->with('success', 'New Category Added successfully');
        }catch(StoringDataException $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput();

        }catch(Exception $e){
            return redirect()->back()->withErrors('Error : Server Error please try again later.')->withInput();
        }
        
    }

    public function categories_edit($id){
        $category = news_type::find($id);
        if(is_null($category)){
            return redirect()->back()->withErrors('Error : No Category with this ID.');
        }else{
            return view('forms.categories_edit')->with('category' , $category);
        }
    }
    public function categories_edit_apply(Request $req , $id){
        $req->validate([
            'category_name' => 'required',
            'description'   => 'required'
        ]);

        $category = news_type::find($id);
        $category->type_name = $req->category_name;
        $category->description = $req->description;
        try{
            if(!$category->save()){
                throw new StoringDataException('Error : We could not update your data successfully.');
            }
            return redirect('/news/categories')->with('success','Category updated successfully. ');
        }catch(StoringDataException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }catch(Exception $e){
            return redirect()->back()->withErrors('Error : Server Error try again later');
        }
    }

    public function categories_delete($id){
        if(news_type::destroy($id)){
            return redirect()->back()->with('success','Category Deleted successfully.');
        }else{
            return redirect()->back()->withErrors('Error : Server Error Please Try again later .');
        }
    }
}
