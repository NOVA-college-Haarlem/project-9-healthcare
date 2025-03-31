<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Technician Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Lab Technician Dashboard</h2>
                        <a href="{{ route('lab-results.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            View All Results
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Pending Follow-up Requests -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pending Follow-up Requests</h3>
                        @if($pendingFollowUps->count() > 0)
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <ul class="divide-y divide-gray-200">
                                    @foreach($pendingFollowUps as $test)
                                        <li class="px-6 py-4 flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ $test->test_name }}</p>
                                                <p class="text-sm text-gray-500">Follow-up Date: {{ $test->test_date->format('M d, Y') }}</p>
                                            </div>
                                            <a href="{{ route('lab-results.create', ['follow_up_id' => $test->id]) }}"
                                               class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Create Result
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="text-gray-500">No pending follow-up requests.</p>
                        @endif
                    </div>

                    <!-- Pending Tests -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pending Tests</h3>
                        @if($pendingTests->count() > 0)
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <ul class="divide-y divide-gray-200">
                                    @foreach($pendingTests as $test)
                                        <li class="px-6 py-4">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $test->test_name }}</p>
                                                    <p class="text-sm text-gray-500">Patient: {{ $test->patient->user->name ?? 'N/A' }}</p>
                                                    <p class="text-sm text-gray-500">Category: {{ $test->test_category }}</p>
                                                    <p class="text-sm text-gray-500">Test Date: {{ $test->test_date->format('M d, Y') }}</p>
                                                </div>
                                                <a href="{{ route('lab-results.edit', $test) }}"
                                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Update Result
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="text-gray-500">No pending tests.</p>
                        @endif
                    </div>

                    <!-- Completed Tests -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Completed Tests</h3>
                        @if($completedTests->count() > 0)
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <ul class="divide-y divide-gray-200">
                                    @foreach($completedTests as $test)
                                        <li class="px-6 py-4">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $test->test_name }}</p>
                                                    <p class="text-sm text-gray-500">Patient: {{ $test->patient->user->name ?? 'N/A' }}</p>
                                                    <p class="text-sm text-gray-500">Category: {{ $test->test_category }}</p>
                                                    <p class="text-sm text-gray-500">Test Date: {{ $test->test_date->format('M d, Y') }}</p>
                                                    <p class="text-sm text-gray-500">Result: {{ $test->result_value }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="text-gray-500">No completed tests.</p>
                        @endif
                    </div>

                    <!-- Reviewed Tests -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Reviewed Tests</h3>
                        @if($reviewedTests->count() > 0)
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <ul class="divide-y divide-gray-200">
                                    @foreach($reviewedTests as $test)
                                        <li class="px-6 py-4">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $test->test_name }}</p>
                                                    <p class="text-sm text-gray-500">Patient: {{ $test->patient->user->name ?? 'N/A' }}</p>
                                                    <p class="text-sm text-gray-500">Category: {{ $test->test_category }}</p>
                                                    <p class="text-sm text-gray-500">Test Date: {{ $test->test_date->format('M d, Y') }}</p>
                                                    <p class="text-sm text-gray-500">Result: {{ $test->result_value }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="text-gray-500">No reviewed tests.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
