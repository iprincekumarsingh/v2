<x-app-layout>
    @include('links.css')
    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">General information</h2>
        <form>
            @foreach ($student as $stu)
                {{-- <div class="row"> --}}
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">First Name</label>
                            <input class="form-control" id="first_name" type="text" value="{{$stu['name']}}" placeholder="Enter your first name"
                                required="">
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Last Name</label>
                            <input class="form-control" id="last_name" type="text" placeholder="Also your last name"
                                required="">
                        </div>
                    </div> --}}
                {{-- </div> --}}
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <label for="birthday">Birthday</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input data-datepicker="" class="form-control datepicker-input" id="birthday" type="text"
                                placeholder="dd/mm/yyyy" required="">
                            <div class="datepicker datepicker-dropdown">
                                <div class="datepicker-picker">
                                    <div class="datepicker-header">
                                        <div class="datepicker-title" style="display: none;"></div>
                                        <div class="datepicker-controls"><button type="button"
                                                class="btn prev-btn">«</button><button type="button"
                                                class="btn view-switch">April 2022</button><button type="button"
                                                class="btn next-btn">»</button></div>
                                    </div>
                                    <div class="datepicker-main">
                                        <div class="datepicker-view">
                                            <div class="days">
                                                <div class="days-of-week"><span class="dow">Su</span><span
                                                        class="dow">Mo</span><span
                                                        class="dow">Tu</span><span
                                                        class="dow">We</span><span
                                                        class="dow">Th</span><span
                                                        class="dow">Fr</span><span
                                                        class="dow">Sa</span></div>
                                                <div class="datepicker-grid"><span class="datepicker-cell day prev"
                                                        data-date="1648319400000">27</span><span
                                                        class="datepicker-cell day prev"
                                                        data-date="1648405800000">28</span><span
                                                        class="datepicker-cell day prev"
                                                        data-date="1648492200000">29</span><span
                                                        class="datepicker-cell day prev"
                                                        data-date="1648578600000">30</span><span
                                                        class="datepicker-cell day prev"
                                                        data-date="1648665000000">31</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1648751400000">1</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1648837800000">2</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1648924200000">3</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649010600000">4</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649097000000">5</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649183400000">6</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649269800000">7</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649356200000">8</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649442600000">9</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649529000000">10</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649615400000">11</span><span
                                                        class="datepicker-cell day focused"
                                                        data-date="1649701800000">12</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649788200000">13</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649874600000">14</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1649961000000">15</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650047400000">16</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650133800000">17</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650220200000">18</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650306600000">19</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650393000000">20</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650479400000">21</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650565800000">22</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650652200000">23</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650738600000">24</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650825000000">25</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650911400000">26</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1650997800000">27</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1651084200000">28</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1651170600000">29</span><span
                                                        class="datepicker-cell day"
                                                        data-date="1651257000000">30</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651343400000">1</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651429800000">2</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651516200000">3</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651602600000">4</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651689000000">5</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651775400000">6</span><span
                                                        class="datepicker-cell day next"
                                                        data-date="1651861800000">7</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datepicker-footer">
                                        <div class="datepicker-controls"><button type="button" class="btn today-btn"
                                                style="display: none;">Today</button><button type="button"
                                                class="btn clear-btn" style="display: none;">Clear</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender">Gender</label>
                        <select class="form-select mb-0" id="gender" aria-label="Gender select example">
                            <option selected="">Gender</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" placeholder="name@company.com"
                                required="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" type="number" placeholder="+12-345 678 910"
                                required="">
                        </div>
                    </div>
                </div>
                <h2 class="h5 my-4">Location</h2>
                <div class="row">
                    <div class="col-sm-9 mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input class="form-control" id="address" type="text" placeholder="Enter your home address"
                                required="">
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input class="form-control" id="number" type="number" placeholder="No." required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input class="form-control" id="city" type="text" placeholder="City" required="">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="state">State</label>
                        <select class="form-select w-100 mb-0" id="state" name="state"
                            aria-label="State select example">
                            <option selected="">State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="zip">ZIP</label>
                            <input class="form-control" id="zip" type="tel" placeholder="ZIP" required="">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
                @endforeach
        </form>
    </div>
</x-app-layout>
