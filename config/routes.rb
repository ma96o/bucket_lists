Rails.application.routes.draw do
  resources :users do
    resources :lists do
      resources :items, only: %i(index)
    end
  end
end
