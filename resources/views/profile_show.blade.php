<div class="profile">
    <div id="tabs-profile">
        <div class="grid-profile">
            <div class="list">
                <h2>{{$user->name}} <span>{{$user->last_name}}</span></h2>
                <ul>
                    <li>
                        <img src="{{asset('images/profile-icons')}}/student.png">
                        <a href="#tabs-1">
                            @lang('main.profile_show.personal_cabinet')
                        </a>
                    </li>
                    <li>
                        <img src="{{asset('images/profile-icons')}}/disk.png">
                        <a href="#tabs-2">
                            @lang('main.profile_show.all_files')
                        </a>
                    </li>
                    <li>
                        <img src="{{asset('images/profile-icons')}}/decor.png">
                        <a href="#tabs-3">
                            @lang('main.profile_show.bookmarks')
                        </a>
                    </li>
                    <li>
                        <img src="{{asset('images/profile-icons')}}/register.png">
                        <a href="#tabs-4">
                            @lang('main.profile_show.checklist')
                        </a>
                    </li>
                    @if (isset($user->userData->study))
                    <li>
                       <img src="{{asset('images/profile-icons')}}/newspaper.png">
                       <a href="#tabs-7">
                         @lang('main.profile_show.my_articles')
                       </a>
                    </li>
                    <li>
                       <img src="{{asset('images/profile-icons')}}/newspaper.png">
                       <a href="#tabs-6">
                         @lang('main.profile_show.my_videos')
                       </a>
                    </li>
                    <li>
                       <img src="{{asset('images/profile-icons')}}/newspaper.png">
                       <a href="#tabs-5">
                         @lang('main.profile_show.create_article')
                       </a>
                   </li>
                    @endif
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <li class="quit-profile">@lang('main.profile_show.get_out')</li></a>
                </ul>
            </div>
            <div class="content">
                <div id="tabs-1">
                    <div class="head">
                        <div class="info">
                            <div class="inner">
                                <div class="img">
                                    <img class="user-avatar" src="{{route('get.avatar')}}">
                                    <div class="edit">
                                        <a href="#" data-toggle="modal" data-target="#editAvatarFormModal">
                                            <img src="{{asset('images')}}/edit.png">
                                        </a>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="item">
                                        <form action="{{route('save_name')}}" id="save_name" method="post">
                                            @csrf
                                        <h6>
                                            <input class="name" type="text" readonly name="name" value="{{$user->name}}">
				    						<span>
                                            <input readonly type="text" class="surname" name="surname" value="{{$user->last_name}}">
				    						</span>
                                        </h6>
                                        <p>@lang('main.profile_show.last_visit') - {{$user->visited->translatedFormat('d F в H:i')}}</p>
                                        <a  href="#" id="save">
                                        <img src="{{asset('images')}}/save.png">
                                        </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btns">
                            <div class="content-btns">
                                <div class="item-btn">
                                    <span>@lang('main.profile_show.notifications')</span>
                                    <label class="btn-sw">
                                        <input type="checkbox" name="checkboxName" class="checkbox">
                                        <div class="switch"></div>
                                    </label>
                                </div>
                                <button class="btn-personalizate">
                                    @lang('main.profile_show.personal')
                                    <img src="{{asset('images')}}/settings.png">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content-profile">
                        <div class="inner">
                            <h4>
                                @lang('main.profile_show.greeting'), {{$user->name}}.
                                @if ($user->alerts->count() > 0)
                                <span>@lang('main.profile_show.alert') <label id="new-count">{{$user->alerts->where('viewed', false)->count()}}</label> <a href="#">@lang('main.profile_show.new_notifications')</a></span>
                                <div data-route="{{route('readall.alert')}}" class="pick-all"><i class="far fa-envelope-open"></i> @lang('main.profile_show.have_read')</div>

                            </h4>
                            <div id="list-profile" class="list-profile">
                                @set($user->alerts, $user->alerts->SortByDesc('created_at'))
                                @foreach($user->alerts as $alert)
                                <div class="item {{($alert->viewed)?'readed': ''}}">
                                    <img src="{{asset('images')}}/icon-{{$alert->type_id}}.png">
                                    <p>
                                        {{$alert->title}}
                                    </p>
                                     <a href="{{route('read.alert', $alert->id)}}">@lang('main.more')</a>
                                    <div data-route="{{route('delete.alert', $alert->id)}}" class="close" title="Удалить"></div>
                                </div>
                                @endforeach
                               </div>
                            @else
                                <span>@lang('main.profile_show.no_notifications')</span>
                                </h4>
                            @endif
                        </div>
                        @if (isset($user->userData->study))
                        <div class="inner">
							<h4>@lang('main.profile_show.my_university')</h4>
							<p>{{$user->userData->study}}</p>
							<h4>@lang('main.profile_show.my_specification')</h4>
							<p>{{$user->userData->direction}}</p>
							<button class="btn btn-primary ml-auto mt-2 univer-change-btn" type="button">@lang('main.profile_show.edit')</button>
						</div>
                        @else
						<form action="{{route('store.university')}}" method="post">
                            @csrf
							<div class="inner country">
								<h4>
									@lang('main.profile_show.chose_university')
								</h4>
								<select class="custom-select" id="exampleFormControlSelectU" name="university_id" required="" data-getFaculties="{{route('university.faculties',0)}}" >
									<option value="" disabled="" selected="">@lang('main.profile_show.to_chose_university')</option>
                                    @foreach($universities as $university)
									<option value="{{$university->id}}">{{$university->name}}</option>
                                    @endforeach
								</select>
								<h4 class="mt-3">
									@lang('main.profile_show.chose_specification')
								</h4>
								<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPrefF" name="faculty_id" required>
									<option selected>@lang('main.profile_show.to_chose_specification')</option>
								</select>
								<button class="btn btn-primary d-block ml-auto mt-2" type="submit">@lang('main.profile_show.save')</button>
							</div>
						</form>
                    @endif
                    <form action="{{route('store.university')}}" method="post" class="univer-change-form">
                        @csrf
						<div class="inner country">
							<h4>
								@lang('main.profile_show.chose_university')
							</h4>
							<select class="custom-select" id="exampleFormControlSelectU" name="university_id" required="" data-getFaculties="{{route('university.faculties',0)}}" >
								<option value="" disabled="" selected="">@lang('main.profile_show.to_chose_university')</option>
                                @foreach($universities as $university)
								<option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
							</select>
							<h4 class="mt-3">
								@lang('main.profile_show.chose_specification')
							</h4>
							<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPrefF" name="faculty_id" required>
								<option selected>@lang('main.profile_show.to_chose_specification')</option>
							</select>
							<button class="btn btn-primary d-block ml-auto mt-2" type="submit">@lang('main.profile_show.save')</button>
						</div>
					</form>
                    </div>
                </div>
                <div id="tabs-2">
                    <div class="head head-min">
                        <div class="info">
                            <div class="inner">
                                <div class="img">
                                    <img class="user-avatar" src="{{route('get.avatar')}}">
                                </div>
                                <div class="text">
                                    <div class="item">
                                        <h6>{{$user->name}} <span>{{$user->last_name}}</span></h6>
                                        <p>@lang('main.profile_show.last_visit') - {{$user->visited->translatedFormat('d F в H:i')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-files">
                        <div class="files">
                            <div class="files-grid">
                                <h3>
                                    @lang('main.profile_show.last_action')
                                    <button></button>
                                </h3>
                                <div class="grid" id="recent-files">
                                   @set($files, $user->files->SortByDesc('created_at'))
                                   @foreach($files as $key=>$file)
                                       @if ($key == 5) @break @endif
                                           @if (!$file->isOwn) @continue @endif
                                    <div>
                                        <div class="img">
                                            <div class="container-svg"><a href="{{route('show.file', $file->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="55.581" height="74.108" viewBox="0 0 55.581 74.108">
                                                    <g id="sheet" transform="translate(-64)">
                                                        <path id="Контур_985" data-name="Контур 985" d="M119.581,0H71.527V7.527H64V74.108h48.054V66.581h7.527ZM65.737,72.371V9.263h33V20.843h11.579V72.371Zm34.738-61.879,8.614,8.614h-8.614Zm17.369,54.353h-5.79V19.615L99.966,7.527h-26.7V1.737h44.581Z" fill="#fff"/>
                                                        <path id="Контур_986" data-name="Контур 986" d="M118,116h13.9v1.737H118Z" transform="translate(-46.184 -99.21)" fill="#fff"/>
                                                        <path id="Контур_987" data-name="Контур 987" d="M118,148h9.264v1.737H118Z" transform="translate(-46.184 -126.578)" fill="#fff"/>
                                                        <path id="Контур_988" data-name="Контур 988" d="M118,196h32.422v1.737H118Z" transform="translate(-46.184 -167.631)" fill="#fff"/>
                                                        <path id="Контур_989" data-name="Контур 989" d="M118,228h32.422v1.737H118Z" transform="translate(-46.184 -194.999)" fill="#fff"/>
                                                        <path id="Контур_990" data-name="Контур 990" d="M118,292h32.422v1.737H118Z" transform="translate(-46.184 -249.735)" fill="#fff"/>
                                                        <path id="Контур_991" data-name="Контур 991" d="M118,324h23.159v1.737H118Z" transform="translate(-46.184 -277.104)" fill="#fff"/>
                                                        <path id="Контур_992" data-name="Контур 992" d="M118,260h32.422v1.737H118Z" transform="translate(-46.184 -222.367)" fill="#fff"/>
                                                        <path id="Контур_993" data-name="Контур 993" d="M262,372h11.579v1.737H262Z" transform="translate(-169.341 -318.156)" fill="#fff"/>
                                                    </g>
                                                </svg></a>
                                            </div>
                                        </div>
                                        <p>{{$file->name}}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="files-grid">
                                <h3>
                                    @lang('main.profile_show.shared_with_u')
                                </h3>
                                <div class="grid">
                                    @set($files, $user->files->SortByDesc('created_at'))
                                    @foreach($files as $key=>$file)
                                        @if ($file->isOwn) @continue @endif
                                            <div>
                                        <div class="img">
                                            <div class="container-svg"><a href="{{route('show.file', $file->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="55.581" height="74.108" viewBox="0 0 55.581 74.108">
                                                    <g id="sheet" transform="translate(-64)">
                                                        <path id="Контур_985" data-name="Контур 985" d="M119.581,0H71.527V7.527H64V74.108h48.054V66.581h7.527ZM65.737,72.371V9.263h33V20.843h11.579V72.371Zm34.738-61.879,8.614,8.614h-8.614Zm17.369,54.353h-5.79V19.615L99.966,7.527h-26.7V1.737h44.581Z" fill="#fff"/>
                                                        <path id="Контур_986" data-name="Контур 986" d="M118,116h13.9v1.737H118Z" transform="translate(-46.184 -99.21)" fill="#fff"/>
                                                        <path id="Контур_987" data-name="Контур 987" d="M118,148h9.264v1.737H118Z" transform="translate(-46.184 -126.578)" fill="#fff"/>
                                                        <path id="Контур_988" data-name="Контур 988" d="M118,196h32.422v1.737H118Z" transform="translate(-46.184 -167.631)" fill="#fff"/>
                                                        <path id="Контур_989" data-name="Контур 989" d="M118,228h32.422v1.737H118Z" transform="translate(-46.184 -194.999)" fill="#fff"/>
                                                        <path id="Контур_990" data-name="Контур 990" d="M118,292h32.422v1.737H118Z" transform="translate(-46.184 -249.735)" fill="#fff"/>
                                                        <path id="Контур_991" data-name="Контур 991" d="M118,324h23.159v1.737H118Z" transform="translate(-46.184 -277.104)" fill="#fff"/>
                                                        <path id="Контур_992" data-name="Контур 992" d="M118,260h32.422v1.737H118Z" transform="translate(-46.184 -222.367)" fill="#fff"/>
                                                        <path id="Контур_993" data-name="Контур 993" d="M262,372h11.579v1.737H262Z" transform="translate(-169.341 -318.156)" fill="#fff"/>
                                                    </g>
                                                </svg></a>
                                            </div>
                                        </div>
                                        <p>{{$file->name}}</p>
                                    </div>
                                    @endforeach
                                 </div>
                            </div>
                            <div class="files-grid">
                                <h3>
                                    @lang('main.profile_show.all_files')
                                </h3>
                                <div class="grid grid-less">
                                    @set($files, $user->files->SortByDesc('created_at'))
                                    @foreach($files as $key=>$file)
                                     <div>
                                        <div class="img">
                                            <div class="container-svg"><a href="{{route('show.file', $file->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="55.581" height="74.108" viewBox="0 0 55.581 74.108">
                                                    <g id="sheet" transform="translate(-64)">
                                                        <path id="Контур_985" data-name="Контур 985" d="M119.581,0H71.527V7.527H64V74.108h48.054V66.581h7.527ZM65.737,72.371V9.263h33V20.843h11.579V72.371Zm34.738-61.879,8.614,8.614h-8.614Zm17.369,54.353h-5.79V19.615L99.966,7.527h-26.7V1.737h44.581Z" fill="#fff"/>
                                                        <path id="Контур_986" data-name="Контур 986" d="M118,116h13.9v1.737H118Z" transform="translate(-46.184 -99.21)" fill="#fff"/>
                                                        <path id="Контур_987" data-name="Контур 987" d="M118,148h9.264v1.737H118Z" transform="translate(-46.184 -126.578)" fill="#fff"/>
                                                        <path id="Контур_988" data-name="Контур 988" d="M118,196h32.422v1.737H118Z" transform="translate(-46.184 -167.631)" fill="#fff"/>
                                                        <path id="Контур_989" data-name="Контур 989" d="M118,228h32.422v1.737H118Z" transform="translate(-46.184 -194.999)" fill="#fff"/>
                                                        <path id="Контур_990" data-name="Контур 990" d="M118,292h32.422v1.737H118Z" transform="translate(-46.184 -249.735)" fill="#fff"/>
                                                        <path id="Контур_991" data-name="Контур 991" d="M118,324h23.159v1.737H118Z" transform="translate(-46.184 -277.104)" fill="#fff"/>
                                                        <path id="Контур_992" data-name="Контур 992" d="M118,260h32.422v1.737H118Z" transform="translate(-46.184 -222.367)" fill="#fff"/>
                                                        <path id="Контур_993" data-name="Контур 993" d="M262,372h11.579v1.737H262Z" transform="translate(-169.341 -318.156)" fill="#fff"/>
                                                    </g>
                                                </svg></a>
                                            </div>
                                        </div>
                                        <p>{{$file->name}}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="memory-disk">
                                <div class="disk disk-frst">
                                    <div class="disk-diag">
                                        <div class="container-svg">
                                            <span>50 @lang('main.mb')</span>
                                            <svg class="progress">
                                                <circle cx="70" cy="70" r="70"></circle>
                                                <circle cx="70" cy="70" r="70" style="stroke-dashoffset: calc(440 - (440 * {{ ($usedSpace/$totalSpace)*100}}) / 100);"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                    <p>@lang('main.profile_show.memory_limit')</p>
                                </div>
                                <div class="disk disk-second">
                                    <div class="disk-diag">
                                        <div class="container-svg">
                                            <span>5 @lang('main.gb')</span>
                                            <svg class="progress">
                                                <circle cx="70" cy="70" r="70"></circle>
                                                <circle cx="70" cy="70" r="70" style="stroke-dashoffset: calc(440 - (440 * {{ ($usedDisk/$totalDisk)*100}}) / 100);"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                    <p>@lang('main.profile_show.all_memory')</p>
                                </div>
                            </div>
                            <div class="upload-files">
                                <h5>
                                    @lang('main.profile_show.start_downloading')
                                    <button></button>
                                </h5>
                                <div class="diag-upload">
                                    <div class="svg">
				    					<span>
					    					<label>{{ number_format(($usedDisk/$totalDisk)*100, 2)}}%</label>
					    					@lang('main.profile_show.downloaded')
					    				</span>
                                        <svg class="progress">
                                            <circle cx="70" cy="70" r="70"></circle>
                                            <circle cx="70" cy="70" r="70" style="stroke-dashoffset: calc(440 - ({{ ($usedDisk/$totalDisk)*100}}) / 100);"></circle>
                                        </svg>
                                    </div>
                                    <div class="info-file">
                                        <p>
                                            @lang('main.profile_show.file_size'):
                                            <span>3.6 @lang('main.mb')</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-3">
                    <div class="head head-min">
                        <div class="info">
                            <div class="inner">
                                <div class="img">
                                    <img class="user-avatar" src="{{route('get.avatar')}}">
                                </div>
                                <div class="text">
                                    <div class="item">
                                        <h6>{{$user->name}} <span>{{$user->last_name}}</span></h6>
                                        <p>@lang('main.profile_show.last_visit') - {{$user->visited->translatedFormat('d F в H:i')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-bookmarks">
                        <div class="r-partners">
                            <div class="partners">
                                @foreach($user->bookmarks as $bookmark)
                                <div class="item">
                                    <i data-route="{{route('remove.bookmark', $bookmark->id)}}"  class="fas fa-times"></i>
                                    <div class="head">
                                        <div class="img">
                                            <img src="{{asset('images/partners/list')}}/{{$bookmark->logo}}">
                                        </div>
                                        <div class="info">
                                            <h5>
                                                {{$bookmark->name}}
                                            </h5>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{$bookmark->city}}, {{$bookmark->country->name}}
                                            </div>
                                            <a class="link" href="{{route('university.show', $bookmark->id)}}">@lang('main.partners.more_info')</a>
                                        </div>
                                    </div>
                                    <img class="img" src="{{asset('images/partners')}}/{{$bookmark->image}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-4">
                    <div class="head head-min">
                        <div class="info">
                            <div class="inner">
                                <div class="img">
                                    <img class="user-avatar" src="{{route('get.avatar')}}">
                                </div>
                                <div class="text">
                                    <div class="item">
                                        <h6>{{$user->name}} <span>{{$user->last_name}}</span></h6>
                                        <p>@lang('main.profile_show.last_visit') - {{$user->visited->translatedFormat('d F в H:i')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-checklists">
                        <h3>@lang('main.profile_show.checklist')</h3>
                        <div class="checklists">
                            @set($checklists, $user->checklists)
                            <table>
                                @foreach($checklists as $checklist)
                                <tr>
                                    <td class="checkbox-list">
                                        <div data-route="{{route('checklist.checked', $checklist->id)}}" @if($checklist->checked)class="active-check"@endif></div>
                                    </td>
                                    <td class="title">
                                        {{$checklist->title}}
                                        <br>
					    				<span>
					    					{{$checklist->fromto}}
					    				</span>
                                    </td>
                                    <td class="price">
                                        {{$checklist->cost}}
                                    </td>
                                    <td class="name-universe">
                                        {{$checklist->fromto}}
                                    </td>
                                    <td class="btns">
                                        <i data-route="{{route('checklist.delete', $checklist->id)}}" class="far fa-trash-alt"></i>
                                    </td>
                                    <td class="date">
                                        {{$checklist->created_at->translatedFormat('j F h:i A')}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
                @if (isset($user->userData->study))
                <div id="tabs-5">
                    <div class="head">
                      <div class="info">
                        <div class="inner">
                          <div class="img">
                            <img class="user-avatar" src="{{route('get.avatar')}}">
                          </div>
                          <div class="text">
                            <div class="item">
                                <h6>
                                    <input class="name" type="text" readonly name="name" value="{{$user->name}}">
    	    						<span>
                                    <input readonly type="text" class="surname" name="surname" value="{{$user->last_name}}">
    	    						</span>
                                </h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="create-post">
                        <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file-upload">
                                      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">@lang('main.profile_show.add_image')</button>
                                      <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" required />
                                        <div class="drag-text">
                                          <h3>@lang('main.profile_show.chose_image')</h3>
                                        </div>
                                      </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                      <div class="file-upload-content">
                                        <img class="file-upload-image" src="#">
                                      </div>
                                    </div>
                                    <div class="inputs">
                                <label for="title">@lang('main.profile_show.title')</label>
                                <textarea rows="3" class="textareal" name="title" required></textarea>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="inputs">
                                <label for="description">@lang('main.profile_show.description')</label>
                                <textarea rows="5" class="textareal" name="description" required></textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="content-Ambassador">
                              <div class="container">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>@lang('main.profile_show.download_image')</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Обзор… <input type="file" id="imgInp" name="image2" accept="image/*" required>
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                </div>
                                <div class="info-3">
                                    <label for="description">@lang('main.profile_show.text')</label>
                                    <textarea rows="5" class="textareal" name="text" required></textarea>
                                </div>
                              </div>
                            </div>
                            <button type="submit">@lang('main.profile_show.create')</button>
                        </form>
                    </div>
                </div>
                <div id="tabs-6">
					<div class="my-blogs">
						<div class="item add">
							<div class="title">
								<h3>@lang('main.profile_show.add_video')</h3>
							</div>
							<form id="videoUploadForm" action="{{route('upload.video')}}" enctype="multipart/form-data" method="post">
                                @csrf
							    <div class="custom-file">
							        <label for="customFileLang">@lang('main.profile_show.chose_file')</label>
							        <label class="custom-file-label" for="customFileLang"></label>
    								<input type="file" name="video" class="custom-file-input" id="video" lang="ru" required accept="video/mp4,video/x-m4v,video/*"/>
    							</div>
                                <div class="progress mt-1 mb-2">
                                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                               <!-- <progress  id="progressBar"  value="0" max="100" style="width: 100%"></progress> -->
    							<div class="form-group">
                                    <label for="videoBlogTit">@lang('main.profile_show.title')</label>
                                    <input type="text" class="form-control" id="videoBlogTit" name="title" required>
                                </div>
    							<div class="form-group">
                                    <label for="videoBlogDes">@lang('main.profile_show.description')</label>
                                    <textarea class="form-control" id="videoBlogDes" rows="3" name="description" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="custom-file">
                                            <label for="customFileLang">@lang('main.profile_show.image') 1</label>
                                            <label class="custom-file-label" for="customFileLang"></label>
                                            <input type="file" name="photo1" class="custom-file-input" id="photo1" required lang="ru"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="custom-file">
                                            <label for="customFileLang">@lang('validation.image') 2</label>
                                            <label class="custom-file-label" for="customFileLang"></label>
                                            <input type="file" name="photo2" class="custom-file-input" id="photo2" required lang="ru"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="custom-file">
                                            <label for="customFileLang">@lang('main.profile_show.poster')</label>
                                            <label class="custom-file-label" for="customFileLang"></label>
                                            <input type="file" name="videobg" class="custom-file-input" id="videobg" required lang="ru"/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 d-block ml-auto">@lang('main.profile_show.publish')</button>
							</form>
						</div>
						<div class="item blogs">
							<div class="title"><h3>@lang('main.profile_show.my_videos')</h3></div>
                            @set($reviews, $user->reviews)
                            <div class="blogs">
                                @foreach($reviews as $review)
								<div class="blog">
                                    <video src="{{route('get.video', $review->id)}}" preload="metadata" type="video/{{explode(".", strtolower($review->video))[1]}}" controls></video>
                                    <form action="{{route('delete.video', $review->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger d-block mt-2 ml-auto mr-auto">
                                            @lang('main.profile_show.delete')
                                        </button>
                                    </form>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
				<div id="tabs-7">
				    <div class="my-post">
				        <div class="banner-news" style="background-image: url('images/bg-post.png')">
                            <div class="container">
                                <h2>@lang('main.profile_show.my_articles')</h2>
                            </div>
                        </div>
                        <div class="another-reviews mt-10 mb-5 mt-lg-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="my-post-content">
                                        @set($articles, $user->articles)
                                        @foreach($articles as $article)
                                        <div>
                                            <div class="item">
                                                <div class="card">
                                                    <img src="{{asset('images/card-reviews')}}/{{$article->image}}">
                                                    <p>
                                                        {{$article->title}}
                                                    </p>
                                                    <div class="stat">
                                                        <div class="stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="date text-capitalize">{{$article->created_at->translatedFormat('d F, Y')}}</div>
                                                    </div>
                                                    <div class="links p-2">
                                                        <a href="{{route('article.show.page', $article->id)}}">@lang('main.profile_show.see')</a>
                                                    </div>
                                                    <form class="deleteUserArticleForm" action="{{route('article.destroy', $article->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger d-block mt-3 ml-auto mr-2 mb-2">@lang('main.profile_show.delete')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
				    </div>
				</div>
                @endif
            </div>
        </div>
    </div>
</div>



<!-- Modal AvatarForm -->
<div class="modal fade" id="editAvatarFormModal" tabindex="-1" role="dialog" aria-labelledby="editAvatarFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAvatarFormModalLabel">@lang('main.profile_show.download_avatar')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAvatarForm" action="{{route('save.avatar')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="avatar-file">@lang('main.profile_show.avatar'):</label>
                    <input type="file" id="avatar-file" name="avatar" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.profile_show.close')</button>
                <button type="submit" class="btn btn-primary">@lang('main.profile_show.save')</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal showAlert -->
<div class="modal fade" id="showAlert" tabindex="-1" role="dialog" aria-labelledby="showAlertTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showAlertTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('main.profile_show.ok')</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal loadFile -->
<div class="modal fade" id="loadFileForm" tabindex="-1" role="dialog" aria-labelledby="loadFileFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loadFileFormTitle">@lang('main.profile_show.file_download')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="loadUserFile" action="{{route('load.file')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control" name="userfile">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('main.profile_show.close')</button>
                <button type="submit" class="btn btn-success">@lang('main.profile_show.download')</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="loaded-file d-none">
    <div class="img">
        <div class="container-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="55.581" height="74.108" viewBox="0 0 55.581 74.108">
                <g id="sheet" transform="translate(-64)">
                    <path id="Контур_985" data-name="Контур 985" d="M119.581,0H71.527V7.527H64V74.108h48.054V66.581h7.527ZM65.737,72.371V9.263h33V20.843h11.579V72.371Zm34.738-61.879,8.614,8.614h-8.614Zm17.369,54.353h-5.79V19.615L99.966,7.527h-26.7V1.737h44.581Z" fill="#fff"/>
                    <path id="Контур_986" data-name="Контур 986" d="M118,116h13.9v1.737H118Z" transform="translate(-46.184 -99.21)" fill="#fff"/>
                    <path id="Контур_987" data-name="Контур 987" d="M118,148h9.264v1.737H118Z" transform="translate(-46.184 -126.578)" fill="#fff"/>
                    <path id="Контур_988" data-name="Контур 988" d="M118,196h32.422v1.737H118Z" transform="translate(-46.184 -167.631)" fill="#fff"/>
                    <path id="Контур_989" data-name="Контур 989" d="M118,228h32.422v1.737H118Z" transform="translate(-46.184 -194.999)" fill="#fff"/>
                    <path id="Контур_990" data-name="Контур 990" d="M118,292h32.422v1.737H118Z" transform="translate(-46.184 -249.735)" fill="#fff"/>
                    <path id="Контур_991" data-name="Контур 991" d="M118,324h23.159v1.737H118Z" transform="translate(-46.184 -277.104)" fill="#fff"/>
                    <path id="Контур_992" data-name="Контур 992" d="M118,260h32.422v1.737H118Z" transform="translate(-46.184 -222.367)" fill="#fff"/>
                    <path id="Контур_993" data-name="Контур 993" d="M262,372h11.579v1.737H262Z" transform="translate(-169.341 -318.156)" fill="#fff"/>
                </g>
            </svg>
        </div>
    </div>
    <p></p>
</div>

