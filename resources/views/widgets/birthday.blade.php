<div class="birthday-widget">
    <h2>Birthday</h2>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Birthday</th>
        </tr>
        </thead>
        <tbody>
        <?php $num = 0; ?>
        @foreach($customers as $customer)
            <tr>
                <td>{{ ++$num }}</td>
                <td>{{$customer}}</td>
                <td>{{$customer->birthday}} ({{$customer->upcomingBirthdayDaysLeft}} days left)</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        <a href="#">More</a>
    </div>
</div>
