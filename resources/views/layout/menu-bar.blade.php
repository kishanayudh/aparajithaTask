<ul class="text-left" style="font-size: 18px;">
    @canany(['create role', 'view role', 'edit role', 'delete role'])
        <li><a href="{{ url('roles') }}">Role</a></li>
    @endcanany
    @canany(['create permission', 'view permission', 'edit permission', 'delete permission'])
        <li><a href="{{ url('permissions') }}">Permission</a></li>
    @endcanany
    @canany(['create accountant', 'view accountant', 'edit accountant', 'delete accountant'])
        <li><a href="{{ url('accountants') }}">Accountant</a></li>
    @endcanany
    @canany(['create income_and_expense', 'view income_and_expense', 'edit income_and_expense', 'delete income_and_expense'])
        <li><a href="{{ url('income_and_expense') }}">Income & Expense</a></li>
    @endcanany
</ul>