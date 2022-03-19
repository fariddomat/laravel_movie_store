@extends('admin.app')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel" style="overflow-x: scroll;">
                        <header class="panel-heading">
                            <h2>Manage Reports</h2>
                        </header>
                        <div class="row">
                            <div class="col-12">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="filter" class="form-control">
                                                <option value="">All reports</option>
                                                <option {{ request('filter') == 'done' ? 'selected' : '' }} value="done">Done
                                                </option>
                                                <option {{ request('filter') == 'pending' ? 'selected' : '' }} value="pending">
                                                    Pending</option>


                                            </select>
                                        </div>


                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                    aria-hidden="true"></i> Filter</button>
                                        </div>
                                </form>
                            </div>
                            <br>

                        </div>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="fa fa-book" style="padding-left: 15px"></i> Movie</th>
                                    <th><i class="fa fa-comment"></i> Comment</th>
                                    <th><i class="fa fa-users"></i> by</th>
                                    <th><i class="fa fa-user"></i> Report by</th>
                                    <th><i class="fa fa-calendar"></i> date</th>
                                    <th><i class="fa fa-ban"></i> Status</th>
                                    <th><i class="fa fa-cogs"></i> Action</th>
                                </tr>
                                @if ($reports->count() > 0)
                                    @foreach ($reports as $report)
                                        @if ($report->comment)
                                        <tr>
                                            <td style="max-width: 150px;padding-left: 15px;font-weight: bold">
                                                @if ($report->comment->movie)
                                                    {{ $report->comment->movie->name }}

                                                @else
                                                    {{ $report->comment->replies[0]->movie->name }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $report->comment->comment }}

                                            </td>
                                            <td>
                                                {{ $report->comment->user->name }}

                                            </td>
                                            <td>
                                                {{ $report->user->name }}

                                            </td>
                                            <td>{{ $report->created_at->toDateString() }}</td>
                                            <td class="{{ $report->status == 'done' ? 'text-success' : 'text-warning' }}">
                                                {{ $report->status }}</td>


                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-success"
                                                        href="{{ route('admin.settings.reportCheck', ['id' => $report->id]) }}"><i
                                                            class="fa fa-check"></i></a>

                                                    <a class="btn btn-warning" target="_blank" style="margin-left: 3px"
                                                        href="{{route('movie.show', ['id' => $report->comment->movie ? $report->comment->movie->id : $report->comment->replies[0]->movie->id]) }}"><i
                                                            class="fa fa-book"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @else
                                    >> Nothing to show
                                @endif
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>

            <div class="row" style="margin-top: 15px">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            {{ $reports->links() }}
                        </ul>
                    </nav> <!-- courses pagination -->
                </div>
            </div> <!-- row -->
        </section>
    </section>
@endsection
