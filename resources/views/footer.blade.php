
<footer>
    <div class="container">
        <div class="grid">
            <div>
                <h5>{{$footer->col1->title}}</h5>
                <ul>
                    @foreach($footer->col1->links as $link)
                    <li>
                        <a href="{{$link->href}}">{{$link->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>{{$footer->col2->title}}</h5>
                <ul>
                    @foreach($footer->col2->links as $link)
                        <li>
                            <a href="{{$link->href}}">{{$link->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>{{$footer->col3->title}}</h5>
                <ul>
                    @foreach($footer->col3->links as $link)
                        <li>
                            <a href="{{$link->href}}">{{$link->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h5>контакты</h5>
                <div class="numbers">
                    <div>
                        <img src="{{asset('images')}}/phone.png">
                    </div>
                    <div>
                        <p><a href="tel:{{$company->phone1}}"> {{$company->phone1}}</a></p>
                        <p><a href="tel:{{$company->phone2}}">{{$company->phone2}}</a></p>
                    </div>
                </div>
                <div class="location">
                    <div>
                        <img src="{{asset('images')}}/loc.png">
                    </div>
                    <div>
                        <p>
                            {{$company->address}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="grid-copyright">
                <div class="social">
                    <div class="inner">
                        @foreach($social_icons as $social)
                            <a href="{{$social->link}}">
                                <img src="{{asset('images')}}/{{$social->image}}" alt="{{$social->name}}" title="{{$social->name}}">
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="text-copyright">
                    <div class="inner">
                        © 2020 Studyportal.uz @lang('main.footer.all_rights').
                    </div>
                </div>
                <div class="logo">
                    Created by
                    <a href="https://vendy.agency">
                        <svg xmlns="http://www.w3.org/2000/svg" width="125" height="40" style="fill: #fff;" viewBox="0 0 773.401 207.582">
                            <g id="Слой_x0020_1" transform="translate(-10202 -21167.744)">
                                <path id="Path_815" data-name="Path 815" d="M28113,21375.324h28.8v-181.1h52.029c21.826,0,33.361,10.311,33.361,32.215v92.1c0,14.047-7.311,26.6-17.254,29-10.7,2.584-42.4,2.324-55.607,2.324l17.621,25.453h27.412c17.57.207,33.809-8.145,42.92-16.6,11.512-10.705,15.561-24.543,15.561-45.715v-81.031c0-34.2-11.957-54.615-41.459-60.754-19.814-4.123-76.439-3.5-103.381-3.365Z" transform="translate(-17443.41 -0.002)" fill-rule="evenodd"/>
                                <path id="Path_816" data-name="Path 816" d="M22001,21379.471h29.449l.314-157.264,77.223,157.264h31.746L22033.846,21172H22001Z" transform="translate(-11490.971 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_817" data-name="Path 817" d="M16432,21379.471h124.918v-24.437l-94.4-.234v-156.637l94.4-.262V21172H16432Z" transform="translate(-6067.359 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_818" data-name="Path 818" d="M10257.06,21379.445h31.459L10232.492,21172H10202Z" transform="translate(-0.001 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_819" data-name="Path 819" d="M33808.8,21379.471h28.82l.391-80.877L33772.641,21172H33744l64.719,126.877Z" transform="translate(-22927.4 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_820" data-name="Path 820" d="M26165,21295.643h30.359V21172H26165Z" transform="translate(-15546.267 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_821" data-name="Path 821" d="M13117,21301.855h30.257l35.428-129.854h-31.3Z" transform="translate(-2838.901 -4.147)" fill-rule="evenodd"/>
                                <path id="Path_822" data-name="Path 822" d="M37070,21262.01h27.309l44.668-88.008h-30l-31.508,65.32Z" transform="translate(-26166.578 -6.094)" fill-rule="evenodd"/>
                                <path id="Path_823" data-name="Path 823" d="M18100.389,24708.832h42.555l.027-24.828H18083Z" transform="translate(-7675.257 -3424.463)" fill-rule="evenodd"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>