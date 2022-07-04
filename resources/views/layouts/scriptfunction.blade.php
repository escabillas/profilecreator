<script type="text/javascript">
$(document).ready(function () {
	window.getRoute = function(route) {
		var routeList = {
			'login': "{{ route('login') }}",
			'contact': "{{ route('contact', ['user' => ':username']) }}",
			'skill': "{{ route('skill', compact('user')) }}",			
			'skill.view': "{{ route('skill.view', compact('user')) }}",
			'skill.edit': "{{ route('skill.edit', ['user' => $user, 'id' => ':id']) }}",
			'skill.update': "{{ route('skill.update', ['user' => $user, 'id' => ':id']) }}",
			'skill.delete': "{{ route('skill.delete', ['user' => $user, 'id' => ':id']) }}",
			'project': "{{ route('project', compact('user')) }}",
			'project.view': "{{ route('project.view', compact('user')) }}",
			'project.edit': "{{ route('project.edit', ['user' => $user, 'id' => ':id']) }}",
			'project.update': "{{ route('project.update', ['user' => $user, 'id' => ':id']) }}",
			'project.delete': "{{ route('project.delete', ['user' => $user, 'id' => ':id']) }}",
			'comment': "{{ route('comment', compact('user')) }}",
			'comment.view': "{{ route('comment.view', compact('user')) }}",
			'comment.edit': "{{ route('comment.edit', ['user' => $user, 'id' => ':id']) }}",
			'comment.update': "{{ route('comment.update', ['user' => $user, 'id' => ':id']) }}",
			'comment.delete': "{{ route('comment.delete', ['user' => $user, 'id' => ':id']) }}",
			'profile.edit': "{{ route('profile.edit', compact('user')) }}",
			'profile.update': "{{ route('profile.update', compact('user')) }}",
			'experience.view': "{{ route('experience.view', compact('user')) }}",
			'experience.edit': "{{ route('experience.edit', ['user' => $user, 'id' => ':id']) }}",
			'experience.delete': "{{ route('experience.delete', ['user' => $user, 'id' => ':id']) }}",
		}

		return routeList[route];
	}

	window.templateSkill = function(items) {
  		return ('\
  			<div class="skill-wrapper content-form-wrapper">\
				<div class="d-flex mx-5 mb-3 justify-content-between">\
					<div class="w-100 me-3">\
						<h5 id="skill-title-'+ items.id +'" class="d-flex w-100 h-100 my-auto align-items-center">'+ items.title +'</h5>\
					</div>\
					@can("update", $user)\
					<div class="d-inline btn-form-wrapper">\
						<div class="d-flex">\
						  	<button type="button" value="'+ items.id +'" id="editSkill" class="btn btn-outline-secondary btn-cust-gray edit-btn me-3 hidden-html">\
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">\
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>\
								</svg>\
							</button>\
						  	<button type="button" value="'+ items.id +'" id="deleteSkill" class="btn btn-outline-danger btn-cust-red delete-btn hidden-html">\
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\
								  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\
								  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\
								</svg>\
							</button>\
					  	</div>\
					</div>\
					@endcan\
				</div>\
			</div>\
		');
  	}

  	window.templateProject = function(items) {
  		return ('\
  			<div class="project-wrapper content-form-wrapper">\
				<div class="d-flex mx-5 mb-5 justify-content-between">\
					<div class="w-100 me-3">\
						<h5 id="project-title-'+ items.id +'" class="d-flex mb-2 w-100 my-auto align-items-center fw-semibold">'+ items.title +'</h5>\
						<h6 id="project-description-'+ items.id +'" class="d-flex w-100 my-auto align-items-top">'+ items.description +'</h6>\
					</div>\
					@can("update", $user)\
					<div class="d-inline btn-form-wrapper">\
						<div class="d-flex">\
					  		<button type="button" value="'+ items.id +'" id="editProject" class="btn btn-outline-secondary btn-cust-gray edit-btn me-3 hidden-html">\
					  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">\
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>\
								</svg>\
					  		</button>\
					  		<button type="button" value="'+ items.id +'" id="deleteProject" class="btn btn-outline-danger btn-cust-red delete-btn hidden-html">\
					  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\
								  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\
								  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\
								</svg>\
					  		</button>\
					  	</div>\
					</div>\
					@endcan\
					</div>\
			</div>\
		');
  	}

  	window.templateNone = function(message) {
  		return ('\
			<div style="height: 100px;" class="menu-content-none d-flex justify-content-center"><h5 class="d-flex my-auto align-middle">'+ message +'</h5></div>\
  		');
  	}

  	window.breakList = function(selector) {
  		$(selector).map(function (e) {
  			$(this).nextAll('hr').remove();

  			if( e+1 < $(selector).length )
  			{
  				$(this).after("<hr>");
  			}
  		});
  	}

  	window.templateComment = function(items, authId) {
  		var url = getRoute('contact');
  		url = url.replace(':username', items.user.username);
  		var date = new Date(items.created_at);

  		if( authId == items.user_id )
  		{
  			var showOption = '\
  				<div class="d-inline btn-form-wrapper">\
					<div class="d-flex comment-option-wrapper">\
				  		<button type="button" value="'+ items.id +'" id="editComment" class="btn btn-outline-secondary btn-cust-gray edit-btn me-3 hidden-html">\
				  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">\
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>\
								</svg>\
				  		</button>\
				  		<button type="button" value="'+ items.id +'" id="deleteComment" class="btn btn-outline-danger btn-cust-red delete-btn hidden-html">\
				  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\
							  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\
							</svg>\
				  		</button>\
				  	</div>\
				</div>\
  			';
  		}
  		else if( authId == items.profile_id )
  		{
  			var showOption = '\
  				<div class="d-inline btn-form-wrapper">\
					<div class="d-flex comment-option-wrapper">\
				  		<button type="button" value="'+ items.id +'" id="deleteComment" class="btn btn-outline-danger btn-cust-red delete-btn hidden-html">\
				  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\
							  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\
							</svg>\
				  		</button>\
				  	</div>\
				</div>\
  			';
  		}
  		else
  		{
  			var showOption = '';
  		}

  		var updated = (items.created_at == items.updated_at)? "" : "Edited";

  		return ('\
  			<div class="comment-wrapper content-form-wrapper">\
				<div class="d-flex mx-5 mb-5 justify-content-between">\
					<div class="w-100 me-3">\
						<div class="d-flex">\
							<a id="comment-user-'+ items.user_id +'" class="d-flex fs-6 me my-auto align-items-center text-decoration-none" target="_blank" href="'+ url +'">'+ items.user.name +' </a>\
							<div class="fs-6 fw-light mx-2">at</div>\
							<div class="fs-6 fw-lighter fst-italic me-2">'+ date.toUTCString() +'</div>\
							<div class="fs-6 fw-lighter fst-italic updated-comment-'+ items.id +'">'+ updated +'</div>\
						</div>\
						<h5 id="comment-'+ items.id +'" class="d-flex mb-2 w-100 my-auto align-items-center">'+ items.comment +'</h5>\
					</div>\
					'+ showOption +'\
					</div>\
			</div>\
		');
  	}
  	
  	window.getAsset = function(filename) {
  		return "{{ asset('') }}" + filename;
  	}

  	window.templateExperience = function(items) {
  		var description = (items.description) ? items.description : "";

  		return ('\
  			<div class="experience-wrapper content-form-wrapper">\
				<div class="d-flex mx-5 mb-5 justify-content-between">\
					<div class="w-100 me-3">\
						<h5 id="experience-position-'+ items.id +'" class="d-flex mb-2 w-100 my-auto align-items-center fw-bold">'+ items.position +'</h5>\
						<h6 id="experience-company-'+ items.id +'" class="d-flex w-100 my-auto align-items-top">'+ items.company +'</h6>\
						<h6 id="experience-startend-'+ items.id +'" class="d-flex w-100 my-auto align-items-top fw-light">'+ getStartEnd(items.current, [items.startdatemonth, items.startdateyear], [items.enddatemonth, items.enddateyear]) +'</h6>\
						<h6 id="experience-description-'+ items.id +'" class="d-flex w-100 mt-2 my-auto align-items-top fw-normal">'+ description +'</h6>\
					</div>\
					@can("update", $user)\
					<div class="d-inline btn-form-wrapper">\
						<div class="d-flex">\
					  		<button type="button" value="'+ items.id +'" id="editExperience" class="btn btn-outline-secondary btn-cust-gray edit-btn me-3 hidden-html">\
					  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">\
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>\
								</svg>\
					  		</button>\
					  		<button type="button" value="'+ items.id +'" id="deleteExperience" class="btn btn-outline-danger btn-cust-red delete-btn hidden-html">\
					  			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\
								  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\
								  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\
								</svg>\
					  		</button>\
					  	</div>\
					</div>\
					@endcan\
					</div>\
			</div>\
		');
  	}

  	window.getStartEnd = function(current,start,end=[]) {
  		var months = {
  		'1': 'Jan',
  		'2': 'Feb',
  		'3': 'Mar',
  		'4': 'Apr',
  		'5': 'May',
  		'6': 'Jun',
  		'7': 'Jul',
  		'8': 'Aug',
  		'9': 'Sep',
  		'10': 'Oct',
  		'11': 'Nov',
  		'12': 'Dec'
  		};

  		if( current )
  		{
  			var startend = months[start[0]] +' '+ start[1] +' - Present';
  		}
  		else{
  			var startend = months[start[0]] +' '+ start[1] +' - '+ months[end[0]] +' '+ end[1];
  		}

  		return startend;
  	}
});
</script>