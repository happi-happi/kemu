<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
               

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link >
                   <!--  :href="route('')" :active="request()->routeIs('/')" -->
                        {{ __('Student System') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->Role }}</div>
                        <div>{{ Auth::user()->Fname }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                      @if(Auth::user()->Role === 'Teacher'||  Auth::user()->Role ==='DiscplineMaster' ) 
                    <x-dropdown-link :href="route('teacher')">
                            {{ __('Home') }}
                        </x-dropdown-link>
                        @endif

                        @if(Auth::user()->Role === 'Burser')   
                        <x-dropdown-link :href="route('BurserPage')">
                            {{ __('Home') }}
                        </x-dropdown-link>  
                        @endif

                       

                        @if(Auth::user()->Role === 'Admin' ) 
                        <x-dropdown-link :href="route('register')">
                            {{ __('Register student') }}
                        </x-dropdown-link>
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Admin' )) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Admin']))
                        )
                        <x-dropdown-link :href="route('viewregisterstaff')">
                            {{ __('Register Staff') }}
                        </x-dropdown-link>
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Admin' || Auth::user()->Role === 'Teacher')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Admin', 'Teacher']))
                        )
                        <x-dropdown-link :href="route('viewregisterguardian')">
                            {{ __('Register Guardian and Parent') }}
                        </x-dropdown-link>
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Admin' )) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Admin']))
                        )
                        <x-dropdown-link :href="route('viewregistersubjects')">
                            {{ __('Register subject') }}
                        </x-dropdown-link>
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Admin' )) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Admin']))
                        )
                        <x-dropdown-link :href="route('viewRegisterSubjectTeacher')">
                            {{ __('Register Subject Teacher ') }}
                        </x-dropdown-link>
                        @endif

                        
            
            

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Your Profile') }}
                        </x-dropdown-link>


                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('studentList')">
                            {{ __('StudentList') }}
                        </x-dropdown-link>  
                        @endif


                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'HeadTeacher')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','HeadTeacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('resultreport')">
                            {{ __('Student Result Report') }}
                        </x-dropdown-link>  
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'HeadTeacher')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','HeadTeacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('createTimetable')">
                            {{ __('Create Time Table') }}
                        </x-dropdown-link>  
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'HeadTeacher'||Auth::user()->Role === 'Admin')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','HeadTeacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('viewtimetable')">
                            {{ __('view timetable') }}
                        </x-dropdown-link>  
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'HeadTeacher'||Auth::user()->Role === 'Admin')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','HeadTeacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('lessonplanview')">
                            {{ __('lesson plan') }}
                        </x-dropdown-link>  
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'HeadTeacher'||Auth::user()->Role === 'Admin')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster','HeadTeacher','Admin']))
                        ) 
                        <x-dropdown-link :href="route('reportlessonplan')">
                            {{ __('lesson plan Report') }}
                        </x-dropdown-link>  
                        @endif
                         

                      <x-dropdown-link :href="route('index')">
                            {{ __('Chat here ') }}
                        </x-dropdown-link>  


                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher']))
                        ) 
                        <x-dropdown-link :href="route('SearchstudentInfo')">
                            {{ __('Search Student') }}
                        </x-dropdown-link>  
                        @endif
                        
                        @if(Auth::user()->Role === 'Teacher'||  Auth::user()->Role ==='DiscplineMaster')   
                        <x-dropdown-link :href="route('import-excel')">
                            {{ __('Upload result') }}
                        </x-dropdown-link>  
                        @endif
                         
                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'Admin')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','Admin' ]))
                        )  
                        <x-dropdown-link :href="route('createresult')">
                            {{ __('Test Upload result') }}
                        </x-dropdown-link>  
                        @endif

                        @if((Auth::guard('web')->check() && (Auth::user()->Role === 'Teacher' || Auth::user()->Role === 'DiscplineMaster'||Auth::user()->Role === 'Admin')) || 
                        (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['DiscplineMaster', 'Teacher','Admin' ]))
                        )   
                        <x-dropdown-link :href="route('GetyourMessage')">
                            {{ __('Mail') }}
                        </x-dropdown-link>  
                        @endif

                        {{-- Check for roles in the 'web' guard --}}
                        @if(
                            (Auth::guard('web')->check() && in_array(Auth::user()->Role, ['Teacher', 'Burser', 'HeadTeacher', 'DiscplineMaster', 'Admin'])) || 
                            (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Teacher', 'Burser', 'HeadTeacher', 'DiscplineMaster', 'Admin']))
                        )
                            <x-dropdown-link :href="route('SendyourMessagePage')">
                                {{ __('Send your Mail') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && in_array(Auth::user()->Role, ['Teacher', 'HeadTeacher', 'DiscplineMaster', 'Admin'])) || 
                            (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['Teacher', 'HeadTeacher', 'DiscplineMaster', 'Admin']))
                        )
                            <x-dropdown-link :href="route('AttendancePage')">
                                {{ __('Attendance') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Student')
                        )
                            <x-dropdown-link :href="route('StudentPaymentRecords')">
                                {{ __('Payment records') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Admin') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Admin')
                        )
                            <x-dropdown-link :href="route('import-excel')">
                                {{ __('Upload result') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Burser') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Burser')
                        )
                            <x-dropdown-link :href="route('BurserPage')">
                                {{ __('Burser Page') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Admin') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Admin')
                        )
                            <x-dropdown-link :href="route('searchuser')">
                                {{ __('User Setting') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Admin') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Admin')
                        )
                            <x-dropdown-link :href="route('AdminStudentFirstMidtermresult')">
                                {{ __('Studentresult') }}
                            </x-dropdown-link>  
                        @endif

                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Burser') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Burser')
                        )
                            <x-dropdown-link :href="route('StudentPaymentStatus')">
                                {{ __('StudentPaymentStatus') }}
                            </x-dropdown-link>  
                        @endif

                        {{-- Check if the user is a Student in the 'web' guard --}}
                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Student')
                        )
                            <x-dropdown-link :href="route('CommentPage')">
                                {{ __('Send your Comment') }}
                            </x-dropdown-link>  
                        @endif

                        {{-- Check if the user is a HeadTeacher in either 'web' or 'staff' guards --}}
                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'HeadTeacher') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'HeadTeacher')
                        )
                            <x-dropdown-link :href="route('NewCommentPage')">
                                {{ __('New Comment') }}
                            </x-dropdown-link>  
                        @endif

                        {{-- Check if the user is a HeadTeacher or Admin in either guard --}}
                        @if(
                            (Auth::guard('web')->check() && in_array(Auth::user()->Role, ['HeadTeacher', 'Admin'])) || 
                            (Auth::guard('staff')->check() && in_array(Auth::guard('staff')->user()->staffRole, ['HeadTeacher', 'Admin']))
                        )
                            <x-dropdown-link :href="route('SchoolInformationPage')">
                                {{ __('School Information') }}
                            </x-dropdown-link>  
                        @endif

                        {{-- Check if the user is an Admin in either guard --}}
                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Admin') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Admin')
                        )
                            <x-dropdown-link :href="route('EditSchoolInformationPage')">
                                {{ __('Edit School Information Page') }}
                            </x-dropdown-link>  
                        @endif

                        {{-- Check if the user is an Admin in either guard --}}
                        @if(
                            (Auth::guard('web')->check() && Auth::user()->Role === 'Admin') || 
                            (Auth::guard('staff')->check() && Auth::guard('staff')->user()->staffRole === 'Admin')
                        )
                            <x-dropdown-link :href="route('Deactivateview')">
                                {{ __('Activate and Deactivate') }}
                            </x-dropdown-link>  
                        @endif


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
       

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
